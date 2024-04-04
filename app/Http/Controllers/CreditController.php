<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Http\Requests\StoreCreditRequest;
use App\Http\Requests\UpdateCreditRequest;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $from = $request->datefrom;
        $to = $request->dateto;
        $type = $request->type;
        $status = $request->status;
        $branch = $request->branches;


        if ($request->branches == '') {
    
            if (Auth::user()->validator == 2) {
                $folder = Credit::select('*')
                ->where('status', $status)
                ->where('nature', $type)
                ->whereBetween('create_at', [$from, $to])
                ->get();
                $branches = Branch::all();
                return response()->json([$folder, $branches]);
            }else {
                return response()->json(['message'=>'Vous ne pouvez pas faire cette recherche']);
            }
        }else {
            $folder = Credit::select('*')
            ->where('token_branch', $branch)
            ->where('status', $status)
            ->where('nature', $type)
            ->whereBetween('create_at', [$from, $to])
            ->get();
            
            $branches = Branch::all();
        return response()->json([$folder, $branches]);
        }
     
    }

    public function loanFolder(Request $request)
    {
        // $request->validated();

        $numberFolder = $request->numberFolder;
        $branch = $request->branches;


        if ($request->branches == '') {
    
            if (Auth::user()->validator == 2) {
                $folder = Credit::select('*')
                ->where('numberFolder', $numberFolder)
                ->get();
                $branches = Branch::all();
                return response()->json([$folder, $branches]);
            }else {
                return response()->json(['message'=>'Vous ne pouvez pas faire cette recherche']);
            }
        }else {
            $folder = Credit::select('*')
            ->where('token_branch', $branch)
            ->where('numberFolder', $numberFolder)

            ->get();
            
            $branches = Branch::all();
        return response()->json([$folder, $branches]);
        }
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreditRequest $request)
    {

        $request->validated();
 
        $dossier =time().'_'.Auth::user()->branch->branchname.'.'.$request->pathFoleder->extension(); 
        $nameFolder = 'dossier/'.Auth::user()->branch->branchname;
        
        $token_user =Auth::user()->token;
        $path = Storage::putFileAs($nameFolder , new file($request->pathFoleder), $dossier );
        $nameCustumer =  htmlspecialchars(strip_tags(stripslashes($request->custumerName)));
        $custumerActivity =  htmlspecialchars(strip_tags(stripslashes($request->custumerActivity)));
        $custumerHome =  htmlspecialchars(strip_tags(stripslashes($request->custumerHome)));
        $custumerActivityHome =  htmlspecialchars(strip_tags(stripslashes($request->custumerActivityHome)));
        $nui =  htmlspecialchars(strip_tags(stripslashes($request->nui)));
        $sexe =  htmlspecialchars(strip_tags(stripslashes($request->sexe)));
        $custumerPhone =  htmlspecialchars(strip_tags(stripslashes($request->custumerPhone)));
        $amount =  htmlspecialchars(strip_tags(stripslashes($request->amount)));
        $deadline =  htmlspecialchars(strip_tags(stripslashes($request->deadline)));
        $type =  htmlspecialchars(strip_tags(stripslashes($request->type)));

        $credit = new credit();
        $credit->token =(string) Uuid::uuid4();
        $credit->token_branch = Auth::user()->branch->token;
        $credit->token_user = $token_user;
        $credit->custumerName = $nameCustumer;
        $credit->custumerActivity = $custumerActivity;
        $credit->custumerPhoneNumber = $custumerPhone;
        $credit->custumerSex = $sexe;
        $credit->custumerNui = $nui;
        $credit->nature = $type;
        $credit->custumerDomicile = $custumerHome;
        $credit->custumerLocalActivity = $custumerActivityHome;
        $credit->amount = $amount;
        $credit->deadline = $deadline;
        $credit->path = $dossier;
        $credit->create_at = date(now());
        $credit->status = 'soumis';
        $credit->save();

        return response()->json(['message'=> 'Dossier soumis !']);       

    }

    /**
     * Display the specified resource.
     */
    public function show(Credit $credit)
    {
        return view('folder.folder', ['credit'=>$credit] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Credit $credit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCreditRequest $request, Credit $credit)
    {
        //
    }
    /**
     * Modifier le statut du dossier
     */
    public function updateStatusFolder(UpdateCreditRequest $request, Credit $credit)
    {
        $request->validate([
            'status'=>'required'
        ]);

        $status = strip_tags(htmlspecialchars(stripslashes($request->status)));
        
        $changeStatus = Credit::find($credit->token);
        $changeStatus->status = $status;
        $changeStatus->update();      
        return response()->json(['message'=>'Réalisé avec succès !']);

    }

    /**
     * Valider le dossier
     */
    public function approveFolder(UpdateCreditRequest $request, Credit $credit)
    {
        $request->validate([
            'numberFolder'=>'required',
            'type'=>'required',
            'amount'=>'required',
            'deadline'=>'required',
            'pathFoleder'=>'required',
            'updated_at'=>'required',
        ]);
        
        $folder = 'deblocage/'.$credit->branch->branchname;
        $image = time().'_'.$credit->branch->branchname.'.'.$request->pathFoleder->extension();
        $path = storage::putFileAs($folder, new file($request->pathFoleder), $image);
       
        $numberFolder = strip_tags(htmlspecialchars(stripslashes($request->numberFolder)));
        $type = strip_tags(htmlspecialchars(stripslashes($request->type)));
        $amount = strip_tags(htmlspecialchars(stripslashes($request->amount)));
        $deadline = strip_tags(htmlspecialchars(stripslashes($request->deadline)));
        $updated_at = strip_tags(htmlspecialchars(stripslashes($request->updated_at)));
        $amountRemboursement = strip_tags(htmlspecialchars(stripslashes($request->remboursement)));
        $firstRemboursementDate = strip_tags(htmlspecialchars(stripslashes($request->firstRemboursement)));
        $lastRemboursementDate = strip_tags(htmlspecialchars(stripslashes($request->lastRemboursement)));
    
        
        $approuveFolder = Credit::find($credit->token);
            $approuveFolder->status = 'debloque';
            $approuveFolder->etat = 'encours';
            $approuveFolder->amountValidated = $amount;
            $approuveFolder->numberFolder = $numberFolder;
            $approuveFolder->nature = $type;
            $approuveFolder->amountRemboursement = $amountRemboursement;
            $approuveFolder->firstRemboursementDate = $firstRemboursementDate;
            $approuveFolder->lastRemboursementDate = $lastRemboursementDate;
            $approuveFolder->deadlineValidated = $deadline;
            $approuveFolder->path2 = $image; 
            $approuveFolder->update_at = $updated_at; 
            $approuveFolder->update();
        return response()->json(['message'=>'Réalisé avec succès !']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Credit $credit)
    {
        //
    }
}
