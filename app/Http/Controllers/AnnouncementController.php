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

    # 顯示 公告管理頁面
    public function showManageIndex()
    {
        $announcements = Announcement::with('category')->orderBy('created_at','DESC')->paginate(10);
        return view('manage.index',[
            'announcements' => $announcements,
            'categories' => Category::all()
        ]);
    }

    # 顯示 新增頁面
    public function viewNewPage()
    {
        return view('manage.new-page',[
            'categories' => Category::all()
        ]);
    }

    # 新增公告
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
        Session::flash('success', '已新增一則公告：【'. $request->title . '】');
        return redirect()->route('manage-index');
    }

    # 顯示 公告頁面 或 編輯公告頁面
    public function viewAnnouncement(Announcement $announcement, $mode) 
    {
        switch($mode){
            case 1:
                return view('manage.view-page', [
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
                return view('manage.view-page', [
                    'announcement' => $announcement
                ]);
                break;
        }
    }

    # 編輯公告
    public function updateAnnouncement(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'content' => 'required|string',
        ]);

        $form = $request->all();
        $announcement->update($form);

        Session::flash('success', '已修改一則公告：【'. $announcement->title . '】');
        return redirect()->route('manage-index');
    }

    # 刪除公告
    public function deleteAnnouncement(Request $request, Announcement $announcement) 
    {        
        $announcement->delete();
        Session::flash('success', '成功刪除公告：【'. $announcement->title . '】');
            
        return redirect()->route('manage-index');
    }

    # 顯示 搜尋公告頁面
    public function viewSearchForm()
    {
        return view('manage.search-page',[
            'categories' => Category::all()
        ]);
    }

    # 搜尋公告
    public function searchAnnouncement(Request $request) {
        $announcements = Announcement::with('category')->orderBy('created_at','DESC')
        ->whereBetween('created_at', [
            $request->input('start_at', date('Y-m-d\TH:i', 0)),
            $request->input('finish_at', date('Y-m-d\TH:i'))
        ]);

        if ($request->category) {
            $announcements = $announcements->whereHas('category', function($query) use ($request) {
                return $query->whereIn('name', $request->input('category', []));
            });
        }

        if ($request->title) {
            $announcements = $announcements->where('title', 'like', "%$request->title%");
        }

        return view('manage.index', [
            'announcements' => $announcements->paginate(10),
            'categories' => Category::all()
        ]);
    }
}
