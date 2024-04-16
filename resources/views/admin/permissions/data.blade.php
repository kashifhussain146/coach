@php $privious_value = ''; @endphp



                        <div class="row">
                            <div class="col-lg-12">

                                <div class="permissions-listing">
                                    <div class="row listing-row">
                                        @foreach($permissions as $permission)

                                                @if($permission->module != $privious_value)
                                                <div class="col-md-12 col-sm-12 permissions-col "> <h3>
                                                    {{ ucwords(str_replace('-', ' ', $permission->module)) }}
                                                </h3>
                                                </div>
                                                @endif

                                                <div class="col-md-4 col-sm-6 permissions-col chk">
                                                    <input type="checkbox" id="permission{{$permission->id}}" name="permission_id[]" value="{{$permission->id}}" {{(!in_array($permission->id, $permissionsIds))?'':'checked'}}>
                                                   <label for="permission{{$permission->id}}">    {{ ucwords(str_replace('-', ' ', $permission->name)) }} ({{ $permission->slug }})  </label>      </div>
                                        @php $privious_value = $permission->module; @endphp
                                        @endforeach
                                    </div>
                                </div>

                            </div>



                        </div>

                        <div class="box-footer btn-bottom">
                            <button type="submit" class="btn btn-primary btn-sm ">Submit</button>
                        </div>