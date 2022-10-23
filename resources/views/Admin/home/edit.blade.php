@extends('Admin.Admin_master')
   @section('admin')

                            <div class="col-lg-12">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Edit HomeAbout</h2>
										</div>
										<div class="card-body">
                                        <form action="{{ url('update/homeabout/'.$homeabout->id) }}" method="post" >
@csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">About Title</label>
													<input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $homeabout->title }}">
													
												</div>
										
											
												<div class="form-group">
													<label for="exampleFormControlTextarea1">About long Description</label>
													<textarea class="form-control"  name="short_dis" id="exampleFormControlTextarea1" rows="3">
                                                    {{ $homeabout->short_dis }}
                                                    </textarea>
												</div>
												

                                                <div class="form-group">
													<label for="exampleFormControlTextarea1">About short Description</label>
													<textarea class="form-control"  name="long_dis" id="exampleFormControlTextarea1"  rows="3">
                                                    {{ $homeabout->long_dis }}
                                                    </textarea>
												</div>

												<div class="form-footer pt-4 pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Submit</button>
													
												</div>
											</form>
										</div>
									</div>










   @endsection