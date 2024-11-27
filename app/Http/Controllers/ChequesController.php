<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Cheque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChequesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('cheques.index', [
          'cheques' => Cheque::all()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('cheques.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
          'check_number' => ['required', 'string'],
          'amount' => ['required', 'numeric'],
          'beneficiary' => ['required', 'string']
      ]);
  
      try {
        Cheque::create([
          "check_number" => $request->check_number,
          "amount" => $request->amount,
          "beneficiary" => $request->beneficiary
        ]);
  
        return redirect()->route('cheque.index');
      } catch (Exception $e) {
        dd($e);
        toast('Whoops!!! Something went wrong ' . $e->getMessage(), 'warning');
        return redirect()->back();
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      return view('cheques.show', [
          'cheque' => Cheque::findOrFail($id)
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      return view('cheques.edit', [
        'cheque' => Cheque::findOrFail($id)
      ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $request->validate([
          'check_number' => ['required', 'string'],
          'amount' => ['required', 'numeric'],
          'beneficiary' => ['required', 'string']
      ]);
  
      try {
        Cheque::where('id', $request->id)->update([
          'check_number' => $request->check_number,
          'amount' => $request->amount,
          'beneficiary' => $request->beneficiary
        ]);
        
        return redirect()->route('cheque.index');
      } catch (Exception $e) {
        dd($e);
        toast('Whoops!!! Something went wrong ' . $e->getMessage(), 'warning');
        return redirect()->back();
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
      // try {
      //     $check_password = Hash::check($request->password, auth()->user()->password);
      //     if (!$check_password) {
      //         toast('These credentials do not match our records', 'warning');
      //         return redirect()->back();
      //     }
      //     $borrower = Cheque::findOrFail($id)->first();
      //     $borrower->delete();

      //     toast('Cheque deleted successfully', 'success');
      //     return redirect()->route('cheque.index');
      // } catch (\Exception $e) {
      //     toast('Whoops!!! Something went wrong ' .  $e->getMessage(), 'warning');
      //     return redirect()->route('cheque.index');
      // }
      $borrower = Cheque::findOrFail($id)->first();
      $borrower->delete();

      toast('Cheque deleted successfully', 'success');
      return redirect()->route('cheque.index');
    }
}
