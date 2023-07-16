<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Bootstrap jQuery selectpicker Libraries using CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="{{asset('css/admin/client/clientDetails0.css')}}">
</head>
<body>

    <div class="content-margin">
        <div class="card">
            <div class="card-header">
                <div>
                    <h4 class="title">My Profile</h4>
                </div>
                <div class="edit-button">
                    <button class="btn btn-md btn-success" id="editButton" onclick="enableEdit()">Edit Profile Information</button>
                </div>
            </div>

            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="personal-informations info-type">
                        <div class="info-title">
                            <h4>Personal Information</h4>
                            <hr>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="" id="" value="{{$client->name}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Date of Birth</label>
                            <input type="text" class="form-control" name="" id="" value="{{$client->dob}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Gender</label>
                            <input type="text" class="form-control" name="" id="" value="{{$client->gender}}" disabled>
                        </div>
                    </div>

                    <hr>
                    <div class="contact-informations info-type">
                        <div class="info-title">
                            <h4>Contact Information</h4>
                            <hr>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="" id="" value="{{$client->phone}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Phone2</label>
                            <input type="text" class="form-control" name="" id="" value="{{$client->phone2}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="" id="" value="{{$client->email}}" disabled>
                        </div>
                    </div>

                    <hr>
                    <div class="address-informations info-type">
                        <div class="info-title">
                            <h4>Address Information</h4>
                            <hr>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">District/City</label>
                            <input type="text" class="form-control" name="" id="" value="{{$client->city}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Area/Upzilla</label>
                            <input type="text" class="form-control" name="" id="" value="{{$client->area}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Zone/Union</label>
                            <input type="text" class="form-control" name="" id="" value="{{$client->zone}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Location</label>
                            <textarea class="form-control text-area" name="" id=""  rows="5" value="{{$client->location}}" placeholder="Village/Para/Mohollah, Flat/Holding No, Road No etc" disabled></textarea>
                        </div>

                    </div>

                    <hr>
                    <div class="banking-informations info-type">
                        <div class="info-title">
                            <h4>Banking Information</h4>
                            <hr>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Bikash</label>
                            <input type="tel" class="form-control" name="" id="" value="{{$client->bikash}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nagad</label>
                            <input type="tel" class="form-control" name="" id="" value="{{$client->nagad}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Rocket</label>
                            <input type="tel" class="form-control" name="" id="" value="{{$client->rocket}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Upay</label>
                            <input type="tel" class="form-control" name="" id="" value="{{$client->upay}}" disabled>
                        </div>
                    </div>

                    <div class="submit-button" id="submitButton">
                        <a href="#" class="btn btn-md btn-success">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function enableEdit(){
            var inputFields=document.getElementsByClassName('form-control');
            var submitButton=document.getElementById('submitButton');
            var radios=document.getElementsByClassName('form-check-input');

            for(var i=0; i<inputFields.length; i++){
                if(inputFields[i].disabled){
                    inputFields[i].disabled=false;
                    submitButton.style.display='block';
                }
                else{
                    inputFields[i].disabled=true;
                    submitButton.style.display='none';
                }
            }

            for(var i=0; i<radios.length; i++){
                if(radios[i].disabled){
                    radios[i].disabled=false;
                }
                else{
                    radios[i].disabled=true;
                }
            }
        }
    </script>
</body>
</html>