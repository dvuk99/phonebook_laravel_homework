<nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
    <a class="navbar-brand" href="#">PhoneBook</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="row">
            <div class="col-12">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('contact.index')}}">Contacts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('country.index')}}">Countries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('city.index')}}">Cities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('hobby.index')}}">Hobbies</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</nav>