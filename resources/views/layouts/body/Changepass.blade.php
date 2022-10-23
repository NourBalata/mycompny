@extends('Admin.Admin_master')
   @section('admin')

   <div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Change Password</h2>
										</div>
										<div class="card-body">
											<form  action="{{ route('password.update') }}" method="post" class="form-pill">
											@csrf	
                                            <div class="form-group">
													<label for="exampleFormControlInput3">Current Password</label>
													<input type="password" name="oldpassword"class="form-control" id="current_password" placeholder="Enter Email">
												@error('oldpassword')
                                                <span class="text_danger">{{ $message }}</span>

                                                @enderror
                                                </div>
												<div class="form-group">
													<label for="exampleFormControlPassword3">New Password</label>
													<input type="password"name="password" class="form-control" id="password" placeholder="Password">
                                                    @error('password')
                                                <span class="text_danger">{{ $message }}</span>

                                                @enderror
                                                </div>
												
                                                <div class="form-group">
													<label for="exampleFormControlPassword3"> Confirm Password</label>
													<input type="password" name="password_confirmation"class="form-control" id="password_confirmation" placeholder="Password">
                                                    @error('password_confirmation')
                                                <span class="text_danger">{{ $message }}</span>

                                                @enderror
                                                </div>

                                                <button type="submit" class="btn btn-primary btn-defult"> Save </button>
											</form>
										</div>
									</div>

								
												
											
										
									



   @endsection