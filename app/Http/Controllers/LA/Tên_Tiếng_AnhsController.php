<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Models\Tên_Tiếng_Anh;

class Tên_Tiếng_AnhsController extends Controller
{
	public $show_action = true;
	public $view_col = 'c1';
	public $listing_cols = ['id', 'c1'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Tên_Tiếng_Anhs', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Tên_Tiếng_Anhs', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Tên_Tiếng_Anhs.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Tên_Tiếng_Anhs');
		
		if(Module::hasAccess($module->id)) {
			return View('la.tên_tiếng_anhs.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new tên_tiếng_anh.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created tên_tiếng_anh in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Tên_Tiếng_Anhs", "create")) {
		
			$rules = Module::validateRules("Tên_Tiếng_Anhs", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Tên_Tiếng_Anhs", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.tên_tiếng_anhs.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified tên_tiếng_anh.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Tên_Tiếng_Anhs", "view")) {
			
			$tên_tiếng_anh = Tên_Tiếng_Anh::find($id);
			if(isset($tên_tiếng_anh->id)) {
				$module = Module::get('Tên_Tiếng_Anhs');
				$module->row = $tên_tiếng_anh;
				
				return view('la.tên_tiếng_anhs.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('tên_tiếng_anh', $tên_tiếng_anh);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("tên_tiếng_anh"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified tên_tiếng_anh.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Tên_Tiếng_Anhs", "edit")) {			
			$tên_tiếng_anh = Tên_Tiếng_Anh::find($id);
			if(isset($tên_tiếng_anh->id)) {	
				$module = Module::get('Tên_Tiếng_Anhs');
				
				$module->row = $tên_tiếng_anh;
				
				return view('la.tên_tiếng_anhs.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('tên_tiếng_anh', $tên_tiếng_anh);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("tên_tiếng_anh"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified tên_tiếng_anh in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Tên_Tiếng_Anhs", "edit")) {
			
			$rules = Module::validateRules("Tên_Tiếng_Anhs", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Tên_Tiếng_Anhs", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.tên_tiếng_anhs.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified tên_tiếng_anh from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Tên_Tiếng_Anhs", "delete")) {
			Tên_Tiếng_Anh::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.tên_tiếng_anhs.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('tên_tiếng_anhs')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Tên_Tiếng_Anhs');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/tên_tiếng_anhs/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Tên_Tiếng_Anhs", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/tên_tiếng_anhs/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Tên_Tiếng_Anhs", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.tên_tiếng_anhs.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
