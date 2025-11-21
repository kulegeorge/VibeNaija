<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Activities;
use App\Models\Expenses;
use Auth;

class EventController extends Controller
{
    public function index($id)
    {
        $arr = array();
        $arrDoc = array();
        $arrvid = array();
        $event = Event::find($id);
         $activity = Activities::where('event_id',$event->id)->first();

         if($activity){
            $arr = array_filter(array_map('trim',(explode("::", $activity->pictures))));
            $arrDoc = array_filter(array_map('trim',(explode("::", $activity->document))));
            $arrvid = array_filter(array_map('trim',(explode("::", $activity->videos))));


         }
      
   
        return view('Frontend.forms.activity_view', compact('event','activity','arr','arrDoc','arrvid'));
       
       } // End Method



        public function edit($id)
        {
            $event = Event::find($id);
         $activity = Activities::where('event_id',$event->id)->first();
       
        return view('Frontend.forms.activity', compact('event','activity'));
       
       }// End Method


    public function expenses($id) {

        $event = Event::find($id);
      
        $arrayWithoutKeys = array();
         $exp = Expenses::where('event_id',$event->id)->get();

          foreach($exp as $key => $exps){
          array_push($arrayWithoutKeys, $exps->amount);
        }

        return view('Frontend.forms.expenses', compact('event','exp','arrayWithoutKeys'));
       
       }// End Method


    public function store(Request $request){

          
      $this->validate($request, [
            'id' => 'required',
            ]);
        $id = Activities::where('event_id', $request->id)->first();

        $filename = $pictures = $videos = '';
         if($request->file('document')){
            $file = $request->file('document');
            $fileExt = $file->getClientOriginalExtension();
            $filename = date('Ymdhis').$file->getClientOriginalName();
        
            //check file size.doc and .docx - Microsoft Word file.

            $ext = array('odt','pdf','rtf','tex','txt','wpd', 'pptx', 'ppt','xls', 'xlsx');

           if(!in_array($fileExt, $ext)){
               
                return redirect()->back()->with('error', "File Type must be odt,pdf,rtf,tex,txt,wpd,pptx,ppt,xls,xlsx");
            }
            $file->move(public_path('documents'),$filename);
           
            }

            //pictures

            if($request->file('pictures')){
            $file = $request->file('pictures');
            $fileExt = $file->getClientOriginalExtension();
            $pictures = date('Ymdhis').$file->getClientOriginalName();
        
            //check file size.doc and .docx - Microsoft Word file.

            $ext = array('jpg','jpeg','gif','png');

           if(!in_array($fileExt, $ext)){
               
                return redirect()->back()->with('error', "File Type must be jpg,jpeg,gif,png");
            }
            $file->move(public_path('pictures/activity_pictures'),$pictures);
           
            }

             //Videos

            if($request->file('videos')){
            $file = $request->file('videos');
            $fileExt = $file->getClientOriginalExtension();
            $videos = date('Ymdhis').$file->getClientOriginalName();
        
            //check file size.doc and .docx - Microsoft Word file.

            $ext = array('mkv','mov ','mp4','mpg','wmv');

           if(!in_array($fileExt, $ext)){
               
                return redirect()->back()->with('error', "File Type must be mkv,mov,mp4,mpg,wmv");
            }
            $file->move(public_path('videos/activity_videos'),$videos);
           
            }

          

        if($id == null){
            //new records uploads
             Activities::create([
                'description' => $request->description,
                'event_id' => $request->id,
                 'document' => $filename, 
                'pictures' => $pictures,
                'videos' => $videos,
                'author' => Auth::User()->name,

            ]);
        
             return redirect()->back()->with('status','Records Created Successfully');

            
        }else{
            //update records
             $user = Activities::findOrFail($id->id);
                $user->description = $request->description;
                $user->document = $id->document.'::'.$filename;
                $user->pictures = $id->pictures.'::'.$pictures;
                $user->videos = $id->videos.'::'.$videos;
   
                $user->save();
    
     return redirect()->back()->with('status','Records Updated Successfully');

        }


        
    }// End Method

    public function EditExpense($id){
        return view('Frontend.forms.activity_view');

     }// End Method

    public function DeleteExpense($id){

          $remove = Expenses::find($id)->delete();
         
         if ($remove) {
            return redirect()->back()->with('status','Expense Removed Successfully!');

         }else{
            return redirect()->back()->with('error','Expense Removed failed!');

         }
        
   }// End Method

 
}
