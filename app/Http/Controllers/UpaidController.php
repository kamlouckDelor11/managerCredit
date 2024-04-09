<?php

namespace App\Http\Controllers;

use App\Models\Upaid;
use App\Http\Requests\StoreUpaidRequest;
use App\Http\Requests\UpdateUpaidRequest;
use App\Models\ActionRecouvery;
use App\Models\Branch;
use App\Models\Credit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

use function Laravel\Prompts\select;

class UpaidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $from = $request->datefrom;
        $to = $request->dateto;
        $branch = $request->branches;


        if ($request->branches == '') {
    
            if (Auth::user()->validator == 2) {
                $folder = Upaid::select('*')
                ->whereBetween('upaidDate', [$from, $to])
                ->get();
                $branches = Branch::all();
                return response()->json([$folder, $branches]);
            }else {
                return response()->json(['message'=>'Vous ne pouvez pas faire cette recherche']);
            }
        }else {
            $folder = Upaid::select('*')
            ->where('token_branch', $branch)
            ->whereBetween('upaidDate', [$from, $to])
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
    public function store(StoreUpaidRequest $request, Credit $credit)
    {
        $request->validated();

        $amountUpaid = strip_tags(stripslashes(htmlspecialchars($request->amountUpaid)));
        $dateUpaid = strip_tags(stripslashes(htmlspecialchars($request->dateUpaid)));
        $upaidMotivation = strip_tags(stripslashes(htmlspecialchars($request->upaidMotivation)));

        $upaid = new Upaid();

        $upaid->token = (string) Uuid::uuid4();
        $upaid->token_credit = $credit->token;
        $upaid->token_branch = $credit->token_branch;
        $upaid->upaidAmount = $amountUpaid;
        $upaid->upaidProof = $upaidMotivation;
        $upaid->numberFolder = $credit->numberFolder;
        $upaid->upaidDate = $dateUpaid;

        $upaid->save();

        return response()->json(['message'=>'Réalisé avec succès !']);
    }

    /**
     * Display the specified resource. 
     */
    public function show(Upaid $upaid)
    {
        $upaids = Upaid::all()
        ->where('token_branch',$upaid->token_branch)
        ->where('numberFolder',$upaid->numberFolder);

        $actonsRecouvery = ActionRecouvery::all();
        return view('upaid.upaid', ['upaid'=>$upaid, 'upaids'=>$upaids, 'actions'=> $actonsRecouvery] );
    }

    /**
     * recouvery upaid.
     */
    public function recouvery(Request $request, Upaid $upaid)
    {
        $request->validate([
            'recouveryUpaid'=>'required',
        ]);


            $amountToSubmit = strip_tags(htmlspecialchars(stripslashes($request->recouveryUpaid)));

            $amountRecouvery = $upaid->upaidRecovery;

            $amountToRecovery = intval($amountToSubmit) + intval($amountRecouvery);


            if ($amountToRecovery > $upaid->upaidAmount) {
                return response()->json(['message'=>'Montant trop grand !']);
                
            } else {
                $upaidToRecovery = Upaid::find($upaid->token);
    
                $upaidToRecovery->upaidRecovery = $amountToRecovery;
        
                $upaidToRecovery->update();
                return response()->json(['message'=>'Réalisé avec succès !']);
            }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Upaid $upaid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUpaidRequest $request, Upaid $upaid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Upaid $upaid)
    {
        //
    }
}
