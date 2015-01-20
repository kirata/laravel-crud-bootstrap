<?php

class DashboardController extends \BaseController {

	public function index()
	{
		if (!Auth::guest()) {
			$data['allsp'] = DB::table('smartphones')
											->join('brands','brand_id','=','id_brand')
											->join('categories','category_id','=','id_category')
											->join('ostypes','ostype_id','=','id_ostype')
											->select('*')
											->paginate(2);

			return View::make('pages.data',$data);
		}
		else{
			return Redirect::to('login');	
		}	
	}
	public function addPage()
	{
		if (!Auth::guest()) {
			$data['categories'] = Categories::all();
			$data['brands'] = Brands::all();
			$data['ostypes'] = Ostypes::all();

			return View::make('pages.add',$data);
		}
		else{
			return Redirect::to('login');
		}
	}
	public function saveData()
	{
		$smartphone = new Smartphones;

		$smartphone->category_id = Input::get('kategori');
		$smartphone->brand_id = Input::get('merk');
		$smartphone->ostype_id = Input::get('os');
		$smartphone->type = Input::get('nama');
		$smartphone->description = Input::get('deskripsi');
		$smartphone->image=Input::file('foto');
		$smartphone->price = Input::get('harga');

		$smartphone->save();
		return Redirect::to('/');
	}
	public function detailPage($id_sp)
	{
		if (!Auth::guest()) {
			$data['allsp'] = DB::table('smartphones')
											->join('brands','brand_id','=','id_brand')
											->join('categories','category_id','=','id_category')
											->join('ostypes','ostype_id','=','id_ostype')
											->select('*')
											->where('id_smartphone','=','$id_sp');

			return View::make('pages.detail',$data);
		}
		else{
			return Redirect::to('login');	
		}
	}
}
