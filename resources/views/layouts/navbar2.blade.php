


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
             <!-- trigger button-->
             <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu" >
                   <span class="navbar-toggler-icon"></span>
             </button>
 
             <!-- collapse div-->
             <div class="collapse navbar-collapse" id="menu">
                 <!--menu-->
                 <ul class="navbar-nav fs-4 ms-3 ">
                     <li class="nav-item text-white fs-1 me-5">
                        <img src="https://illalet.com/wp-content/uploads/illust/16_2_607.png" alt="no image" style="width: 50px";>
                     </li>
                     <li class="nav-item mx-3">
                        <a href="/" 
                          class="nav-link">Menu
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="{{route('cartlist_index')}}" 
                          class="nav-link"><i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="nav-link" 
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>                                           
                 </ul>
             </div>
             <a href="/profile"
                          class="text-decoration-none text-white"><span class="fw-bold fs-3 me-3">HELLO!</span> {{$user->name_sei .' '. $user->name_mei}}
             </a>
        </div>
    </nav>


  
