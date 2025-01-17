<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dailyic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DailyIcController extends Controller
{
    public function index()
    {
        $dailyic = Dailyic::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->whereBetween('created_at', [
            Carbon::now()->format('Y-m-d 00:00:00'), Carbon::now()->format('Y-m-d 23:59:59')
        ])->get();
        return view('ic.dailyic', [
            "title" => "Inovasi/Creativity"
        ], compact('dailyic'));
    }

    public function create()
    {
        $user = User::all();
        return view('ic.newdailyic', [
            "title" => "Daily Report Inovasi/Creativity"
        ], compact('user'));
    }

    public function edit($id)
    {
        $dailyic = DailyIc::find($id);
        // $longterm->delete();

        return view('ic.editdailyic', [
            "title" => "Edit Daily Inovasi/Creativity"
        ], compact('dailyic'));
    }

    public function update(Request $request, $id)
    {
        $dailyic = Dailyic::find($id);
        $validated_data = $request->validate([
            'date' => 'required',
            'timestart' => 'required',
            'timefinish' => 'required',
            'plan' => 'required',
            'actual' => 'required',
            'progress' => 'required|numeric',
            'pict' => 'image',
            'desc' => 'required',
        ]);

        if (array_key_exists('pict', $validated_data)) {
            $image_data = $request->file('pict');
            $filename = 'uploads/dailyic/' . Auth::user()->username . time() . '.jpg';

            $image = Image::make($image_data);

            $image->fit(800, 600);
            $image->encode('jpg', 90);
            $image->stream();
            Storage::disk('local')->put('public/' . $filename, $image, 'public');
            Storage::disk('local')->delete($dailyic->pict);

            $validated_data['pict'] = 'storage/' . $filename;
        }

        $dailyic->update($validated_data);
        return redirect('dailyic')->with('edit', 'Data berhasil diubah!');
    }

    public function editHistory($id)
    {
        $dailyic = Dailyic::find($id);

        return view('ic.editdailyichistory', [
            "title" => "Edit Daily Self-Development"
        ], compact('dailyic'));
    }

    public function updateHistory(Request $request, $id)
    {
        $dailyic = Dailyic::find($id);
        $validated_data = $request->validate([
            'date' => 'required',
            'timestart' => 'required',
            'timefinish' => 'required',
            'plan' => 'required',
            'actual' => 'required',
            'progress' => 'required|numeric',
            'pict' => 'image',
            'desc' => 'required',
        ]);

        if (array_key_exists('pict', $validated_data)) {
            $image_data = $request->file('pict');
            $filename = 'uploads/dailyic/' . Auth::user()->username . time() . '.jpg';

            $image = Image::make($image_data);

            $image->fit(800, 600);
            $image->encode('jpg', 90);
            $image->stream();
            Storage::disk('local')->put('public/' . $filename, $image, 'public');
            Storage::disk('local')->delete($dailyic->pict);

            $validated_data['pict'] = 'storage/' . $filename;
        }

        $dailyic->update($validated_data);
        return  redirect('dailyic/history')->with('edit', 'Data berhasil diubah!');
    }

    public function destroy(Dailyic $dailyic)
    {
        $dailyic->delete();
        return redirect()->back()->with([
            'success' => 'Data berhasil dihapus.'
        ]);
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'date' => 'required',
            'timestart' => 'required',
            'timefinish' => 'required',
            'plan' => 'required',
            'actual' => 'required',
            'progress' => 'required|numeric',
            'pict' => 'image',
            'desc' => 'required',
        ]);

        $image_data = $request->file('pict');
        $filename = 'uploads/dailyic/' . Auth::user()->username . time() . '.jpg';

        $image = Image::make($image_data);

        $image->fit(800, 600);
        $image->encode('jpg', 90);
        $image->stream();
        Storage::disk('local')->put('public/' . $filename, $image, 'public');

        $validated_data['pict'] = 'storage/' . $filename;
        $dailyic = new Dailyic($validated_data);
        $dailyic->user()->associate(Auth::user());
        $dailyic->save();

        return redirect('dailyic')->with('success', 'Data berhasil disimpan!');
    }
    public function history()
    {
        $dailyic = Dailyic::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->simplePaginate(6);
        return view('ic.historyic', [
            "title" => "History Report Inovasi/Creativity",
        ], compact('dailyic'));
    }
    public function viewadmin(Request $request)
    {
        $keyword = $request->keyword;
        $dailyic = Dailyic::whereHas('user', function ($query) use ($keyword) {
            $query->where('firstname', 'LIKE', '%' . $keyword . '%')
                ->orWhere('lastname', 'LIKE', '%' . $keyword . '%')
                ->orWhereHas('divisi', function ($query) use ($keyword) {
                    $query->where('divisi', 'LIKE', '%' . $keyword . '%');
                });
        })->orderBy('id', 'DESC')->paginate(10);
        return view('admin.viewicadm', [
            "title" => "Daily Report Inovasi/Creativity"
        ], compact('dailyic'));
    }
}
