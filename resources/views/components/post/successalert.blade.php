
        @if (Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> {{Session::get('error')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success</strong> {{Session::get('success')}}<a href="{{route('user_detail',['id'=>Session::get('form_status_user')])}}" class="alert-link"> View details</a>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
