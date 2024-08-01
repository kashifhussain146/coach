  <!-- Navbar -->
  <style>
      .top-text-block {
          display: block;
          padding: 3px 20px;
          clear: both;
          font-weight: 400;
          line-height: 1.42857143;
          color: #333;
          white-space: inherit !important;

          position: relative;
      }

      .top-text-block:hover:before {
          content: '';
          width: 4px;
          background: #f05a1a;
          left: 0;
          top: 0;
          bottom: 0;
          position: absolute;
      }

      .top-text-block.unread {
          background: #ffc;
      }

      .top-text-block .top-text-light {
          color: #999;
          font-size: 0.8em;
      }

      .dropdown-menu {
          min-width: 25rem !important;
      }

      .top-head-dropdown .dropdown-menu {
          width: 350px;
          height: 300px;
          overflow: auto;
      }

      .top-head-dropdown li:last-child .top-text-block {
          border-bottom: 0;
      }

      .topbar-align-center {
          text-align: center;
      }

      .loader-topbar {
          margin: 5px auto;
          border: 3px solid #ddd;
          border-radius: 50%;
          border-top: 3px solid #666;
          width: 22px;
          height: 22px;
          -webkit-animation: spin-topbar 1s linear infinite;
          animation: spin-topbar 1s linear infinite;
      }

      @-webkit-keyframes spin-topbar {
          0% {
              -webkit-transform: rotate(0deg);
          }

          100% {
              -webkit-transform: rotate(360deg);
          }
      }

      @keyframes spin-topbar {
          0% {
              transform: rotate(0deg);
          }

          100% {
              transform: rotate(360deg);
          }
      }
  </style>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                      class="fas fa-bars"></i></a></li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          @php $authUser = Auth::guard('admin')->user(); @endphp

          <li class="nav-item dropdown">
              {{-- <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><strong>{{count(getNotifications())}} </strong> </span>
        </a> --}}
              {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{count(getNotifications())}} Proposals Recieved</span>
          <div class="dropdown-divider"></div>

          @foreach (getNotifications() as $item)
              <h5 class="nav-link"> New Task Recieved </h5>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> {{$item->unique_group_id}}
              <span class="float-right text-muted text-sm">Expired on {{ date('d/m/Y H:i',strtotime($item->deadline_date_time))}}</span>
            </a>
          @endforeach
         
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div> --}}

              <div class="panel-body">
                  <a class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="far fa-bell"></i>
                      <span class="badge badge-warning navbar-badge"><strong>{{ count(getNotifications()) }} </strong>
                      </span>
                  </a>

                  <ul class="dropdown-menu dropdown-menu-right">
                      @if (getNotifications()->count() > 0)
                          @foreach (getNotifications() as $item)
                              @if ($item->freelancers->first()->status == \App\Models\Proposals::STATUS_PREVIEW)
                                  <li>
                                      <a href="#" class="top-text-block">
                                          <div class="top-text-heading">You recieved new task <br /> Task ID : <b>
                                                  {{ $item->unique_group_id }} </b> </div>
                                          <div class="top-text-light">Task Deadline :
                                              {{ date('d/m/Y H:i', strtotime($item->deadline_date_time)) }} </div>
                                      </a>

                                      <div class="top-text-block">
                                          <a
                                              href="{{ route('status-update', ['id' => $item->freelancers->first()->id, 'status' => \App\Models\Proposals::STATUS_ACCEPTED]) }}"><button
                                                  class="btn-sm btn btn-success ">I can do it</button></a>
                                          &nbsp;&nbsp;&nbsp;
                                          <a
                                              href="{{ route('status-update', ['id' => $item->freelancers->first()->id, 'status' => \App\Models\Proposals::STATUS_REJECTED]) }}"><button
                                                  class="btn-sm  btn btn-danger ">I can't do it</button>
                                      </div>
                                  </li>
                                  <hr />
                              @elseif(in_array($item->freelancers->first()->status, [
                                      \App\Models\Proposals::STATUS_ASSIGNED,
                                      \App\Models\Proposals::STATUS_REASSIGNED,
                                  ]))
                                  <li>
                                      <a href="{{ route('tasks-start-work', ['task' => $item->id]) }}"
                                          class="top-text-block">

                                          @if ($item->freelancers->first()->status == \App\Models\Proposals::STATUS_ASSIGNED)
                                              <div class="top-text-heading">New Task assigned <br /> Task ID : <b>
                                                      {{ $item->unique_group_id }} </b>
                                              </div>
                                          @else
                                              <div class="top-text-heading">Task has been Re-Assigned <br /> Task ID :
                                                  <b>
                                                      {{ $item->unique_group_id }} </b>
                                              </div>
                                          @endif

                                          <div class="top-text-light">Task Deadline :
                                              {{ date('d/m/Y H:i', strtotime($item->deadline_date_time)) }} </div>
                                      </a>
                                  </li>
                                  <hr />
                              @endif
                          @endforeach
                      @else
                          <li>

                              <div class="top-text-block">
                                  No new notifications
                              </div>
                          </li>
                      @endif
                  </ul>
              </div>

          </li>

          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  @if (!empty($authUser->profile_image))
                      <img src="{{asset('images/'.$authUser->profile_image)}}" alt="user"
                          class="rounded-circle" width="30" height="30">
                  @else
                      <img src="#" alt="user" class="rounded-circle" width="30" height="30">
                  @endif

                  <span class="m-l-5 font-medium d-none d-sm-inline-block"> {{ $authUser->name }} <i
                          class="mdi mdi-chevron-down"></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                  <span class="with-arrow">
                      <span class="bg-primary"></span>
                  </span>
                  <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                      <div class="">
                          @if (!empty($authUser->profile_image))
                              <img src="{{asset('images/'.$authUser->profile_image)}}" alt="user"
                                  class="rounded-circle" width="30" height="30">
                          @else
                              <img src="#" alt="user" class="rounded-circle" width="30" height="30">
                          @endif
                      </div>
                      <div class="m-l-10">
                          <h4 class="m-b-0">{{ $authUser->name }}</h4>
                          <p class=" m-b-0">{{ $authUser->email }}</p>
                      </div>
                  </div>
                  <div class="profile-dis scrollable">

                      <a class="dropdown-item" href="{{ route('admin.profile') }}">
                          <i class="ti-user m-r-5 m-l-5"></i> My Profile
                      </a>


                      <button type="button" data-toggle="modal" data-target="#logoutModal" class="dropdown-item"> <i
                              class="fa fa-power-off m-r-5 m-l-5"></i> Logout</button>




                      <div class="dropdown-divider"></div>

                  </div>
                  <!-- <div class="p-l-30 p-10">
                <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a>
            </div>-->
              </div>
          </li>


      </ul>
  </nav>
  <!-- /.navbar -->

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  Are you sure you want to logout ?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                  <a class="btn btn-primary" href="#"
                      onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Yes </a>

                  @if (Auth()->user()->roles()->first()->name == 'Free Lancer')
                      <form id="logout-form" action="{{ route('freelancer.post.logout') }}" method="POST"
                          style="display: none;">
                      @else
                          <form id="logout-form" action="{{ route('admin.post.logout') }}" method="POST"
                              style="display: none;">
                  @endif
                  {{ csrf_field() }}
                  </form>

              </div>
          </div>
      </div>
  </div>
