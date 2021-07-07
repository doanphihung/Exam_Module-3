<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCreate;
use App\Http\Requests\FormUpdate;
use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencies = Agency::all();
        return view('list', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormCreate $request)
    {
        $agency = new Agency();
        $agency->fill($request->all());
        $agency->save();
        Session::flash('success', 'Thêm đại lý thành công');
        return redirect()->route('agency.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Agency $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Agency $agency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agency = Agency::findOrFail($id);
        return view('edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Agency $agency
     * @return \Illuminate\Http\Response
     */
    public function update(FormUpdate $request, $id)
    {
        $agency = Agency::findOrFail($id);
        $agency->fill($request->all());
        $agency->save();
        Session::flash('success', 'Sửa đại lý thành công');
        return redirect()->route('agency.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Agency $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agency = Agency::findOrFail($id);
        $agency->delete();
        Session::flash('success', 'Xóa đại lý thành công');
        return redirect()->route('agency.index');

    }

    public function search(Request $request)
    {
        $keyWord = $request->input('keyWord');
        if ($keyWord) {
            $agencies = Agency::where('name', 'LIKE', "%$keyWord%")->get();
            return view('list', compact('agencies'));
        } else {
            return back();
        }
    }
}
