<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Bootstrap jQuery selectpicker Libraries using CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
    <link rel="stylesheet" href="{{asset('css/admin/client/clientDetails.css')}}">
    <div class="content-margin">
        <div class="card">
            <div class="card-header ">
                <h4 class="card-title">My Profile</h4>
            </div>

            <div class="flex card-body"> 
                @if ($client->image)
                    <div class="profile-pic">
                        <img src="{{asset('storage/images/users/'.$client->image)}}" class="photo">
                    </div>                      
                @endif
  
            <form>
                @csrf

                <div class="row user-details">
                    <div class="address">
                        <h4>Personal Information</h4>
                        <hr>
                    </div>

                    <div class="col-md info-section">

                        <div class="info">
                            <h6>Name:</h6>
                            <h5>{{$client->Name}}</h5>
                        </div>


                        <div class="info">
                            <h6>Phone No</h6>
                            <h5>{{$client->phone}}</h5>
                        </div>

                        <div class="info">
                            <h6>Another Phone No</h6>
                            <h5>{{$client->phone2}}</h5>
                        </div>      

                        <div class="info">
                            <h6>Email</h6>
                            <h5>{{$client->email}}</h5>
                        </div>
                    </div>

                    <div class="address">
                        <h4>Address</h4>
                        <hr> 
                    </div>

                    <div class="col-md info-section">

                        <div class="info">
                            <h6>City</h6>
                            <h5>{{$client->city}}</h5>
                        </div> 

                        <div class="info">
                            <h6>Area</h6>
                            <h5>{{$client->area}}</h5>
                        </div> 

                        <div class="info">
                            <h6>Zone</h6>
                            <h5>{{$client->zone}}</h5>
                        </div>    
        
                        <div class="info">
                            <h6>Location</h6>
                            <h5>{{$client->location}}</h5>
                        </div> 
                    </div>

                    <div class="address">
                        <h4>Banking Information</h4>
                        <hr> 
                    </div>

                    <div class="col-md info-section">

                        <div class="info">
                            <h6>Bikash Number</h6>
                            <h5>{{$client->bikash}}</h5>
                        </div> 

                        <div class="info">
                            <h6>Nagad Number</h6>
                            <h5>{{$client->nagad}}</h5>
                        </div> 

                        <div class="info">
                            <h6>Rocket Number</h6>
                            <h5>{{$client->nagad}}</h5>
                        </div> 

                    </div>
                </div>

                <div class="edit">
                    <a href="#"><h3 class="edit-click">Click Here to Edit the User!</h3></a></h3>
                </div>
            </div>

            </form>
        </div>
    </div>
