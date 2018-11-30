<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Category;
use Input;
use Session;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showManageIndex()
    {
        $announcements = Announcement::with('category')->orderBy('created_at','DESC')->paginate(10);
        return view('manage.index',[
            'announcements' => $announcements
        ]);
    }

    public function viewNewPage()
    {
        return view('manage.new-page',[
            'categories' => Category::all()
        ]);
    }

    public function newAnnouncement(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'content' => 'required|string',
        ]);

        Announcement::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'reference' => $request->reference
        ]);
        Session::flash('success', '已新增一則公告。');
        return redirect()->route('manage-index');
    }

    public function viewAnnouncement(Announcement $announcement, $mode) {
        switch($mode){
            case 1:
                return view('manage.announcement-view', [
                    'announcement' => $announcement
                ]);
                break;
            case 2:
                return view('manage.edit-page', [
                    'announcement' => $announcement,
                    'categories' => Category::all()
                    ]);
                    break;
            default:        
                return view('manage.announcement-view', [
                    'announcement' => $announcement
                ]);
                break;
        }
    }

    public function updateAnnouncement(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'content' => 'required|string',
        ]);

        $form = $request->all();
        $announcement->update($form);

        Session::flash('success', '已修改一則公告。');
        return redirect()->route('manage-index');
    }
}
