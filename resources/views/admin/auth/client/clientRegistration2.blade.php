<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registration Page</title>
  <link rel="stylesheet" href="{{asset('css/admin/client/clientRegistration.css')}}">
</head>
<body>
  <div class="container">
{{--     
    <div class="profile-icon">
        <img src="{{asset('/image/profile2.jpg')}}" alt="">
    </div>
 --}}

    <form>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone No:</label>
        <input type="text" id="phone" name="phone" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="confirmPassword">Re-enter password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
      </div>
      <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <input type="date" class="dob" id="dob" name="dob" required>
      </div>

      <div class="form-group">
          <label for="" class="form-label">District:</label>
          <select class="form-select form-select-lg select2" name="district" id="district">
            <option value="">Select District</option>
            @foreach ($districts as $district)
                <option value="{{$district->district}}">{{$district->district}}</option>
            @endforeach
          </select>
      </div>

      <div class="form-group">
          <label for="" class="form-label">Upzilla:</label>
          <select class="form-select form-select-lg select2" name="upzilla" id="upzilla">
            <option value="">Select Upzilla</option>
            @foreach ($upzillas as $upzilla)
                <option value="{{$upzilla->upzilla}}">{{$upzilla->upzilla}}</option>
            @endforeach
          </select>
      </div>

      <div class="form-group">
        <label for="village">Village:</label>
        <input type="text" id="village" name="village" required>
      </div>
      <input type="submit" value="Register">
    </form>
  </div>

  <!-- Bootstrap JavaScript Libraries -->
{{--   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
 --}}  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Bootstrap jQuery selectpicker Libraries using CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
  <script>
     $(document).ready(function(){
      $('.select2').select2();
     });
  </script>
</body>
</html>
