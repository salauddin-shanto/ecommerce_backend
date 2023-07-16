@extends('admin/layout/layout')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease-in-out;
        }

        .popup-overlay.show {
            opacity: 1;
            pointer-events: auto;
        }

        .popup-content {
            background-color: #fff;
            border-radius: 5px;
            padding: 40px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: center;
        }

        .popup-content h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #666;
        }

        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-group {
            display: flex;
            justify-content: flex-end;
        }

        .btn-group button {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .btn-group button.submit-btn {
            background-color: #4CAF50;
            color: #fff;
            margin-right: 10px;
            margin-left: 10px;
        }

        .btn-group button.cancel-btn {
            background-color: #ccc;
            color: #333;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/admin/admin/adminDetails.css')}}">
    <div class="content-margin">
        <div class="card">
            <div class="flex card-body"> 
                <div class="profile-pic">
                    <img src="{{asset('storage/images/users/'.$user->image)}}" class="photo">
                </div>   

                <div class="row user-details">
                    <div class="col-md">
                        <div class="info">
                            <h6>Name</h6>
                            <h5>{{$user->name}}</h5>
                        </div>

                        <div class="info">
                            <h6>User Name</h6>
                            <h5>{{$user->user_name}}</h5>
                        </div>

                        <div class="info">
                            <h6>Phone No</h6>
                            <h5>{{$user->phone}}</h5>
                        </div>

                        @if ($user->phone2)
                            <div class="info">
                                <h6>Another Phone No</h6>
                                <h5>{{$user->phone2}}</h5>
                            </div>      
                        @endif

                        <div class="info">
                            <h6>Email</h6>
                            <h5>{{$user->email}}</h5>
                        </div>


                        <div class="info">
                            <h6>NID</h6>
                            <h5>{{$user->nid}}</h5>
                        </div>
                    </div>


                    <div class="col-md">
                        <div class="roles-section">
                            <div>
                                <h3><a href="{{route('show-roles')}}" class="roles-header">Roles</a></h3>
                            </div>
                            @foreach ($user->roles as $role)
                                <div class="roles">{{$role->name}}</div>  
                            @endforeach
                        </div>

                        <div class="permissions-section">
                            <h3>
                                Permissions
                            </h3>
                            @foreach ($user->roles as $role)
                                @foreach ($role->permissions as $permission)
                                    <div class="permissions">{{$permission->name}}</div> 
                                @endforeach
                                 
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="edit">
                    <button class="btn btn-lg bg-primary" id="reset-password-btn">Reset Password</button>
{{--                     <a href="{{route('reset-password-admin',['id'=>$user->id])}}"><h3 class="edit-click">Reset Password</h3></a></h3>
 --}}           </div>
            </div>        
        </div>
    </div>

    <div class="container">
        <div class="popup-overlay" id="popup-overlay">
            <div class="popup-content">
                <h2>Reset Password</h2>

                <form action="{{route('admin-password-reset',['id'=>$user->id])}}" method="POST" id="reset-password-form">
                    @csrf
                    <div class="form-group">
                        <label for="new-password">New Password:</label>
                        <input type="password" id="new-password" name="password" required>
                        <div class="error-message" id="new-password-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" id="confirm-password" name="confirm_password" required>
                        <div class="error-message" id="confirm-password-error"></div>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="cancel-btn" id="cancel-btn">Cancel</button>
                        <button type="submit" class="submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        const resetPasswordBtn = document.getElementById('reset-password-btn');
        const popupOverlay = document.getElementById('popup-overlay');
        const cancelBtn = document.getElementById('cancel-btn');
        const newPasswordInput = document.getElementById('new-password');
        const confirmPwdInput = document.getElementById('confirm-password');
        const newPasswordError = document.getElementById('new-password-error');
        const confirmPwdError = document.getElementById('confirm-password-error');

        resetPasswordBtn.addEventListener('click', () => {
            popupOverlay.classList.add('show');
        });

        cancelBtn.addEventListener('click', () => {
            popupOverlay.classList.remove('show');
        });

        document.getElementById('reset-password-form').addEventListener('submit', (event) => {
            event.preventDefault();
            newPasswordError.textContent = '';
            confirmPwdError.textContent = '';

            // Perform password validation
            const newPassword = newPasswordInput.value;
            const confirmPwd = confirmPwdInput.value;

            // Password regex pattern
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;

            if (!passwordRegex.test(newPassword)) {
                newPasswordError.textContent = 'The password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.';
                return;
            }

            if (newPassword !== confirmPwd) {
                confirmPwdError.textContent = 'Passwords do not match.';
                return;
            }

            document.getElementById('reset-password-form').submit();
        });
    </script>

@endsection