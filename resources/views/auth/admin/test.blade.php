<div class="profile-info">
    <div class="info-item">
        <label>Name:</label>
        <span>{{ $user->name }}</span>
    </div>
    <div class="info-item">
        <label>User Name:</label>
        <span>{{ $user->user_name }}</span>
    </div>

    <div class="info-item">
        <label>Email:</label>
        <span>{{ $user->email }}</span>
    </div>
    <div class="info-item">
        <label>Phone:</label>
        <span>{{ $user->phone }}</span>
    </div> 
    <div class="info-item">
        <label>Another Phone:</label>
        <span>{{ $user->phone2 }}</span>
    </div>
    <div class="info-item">
        <label>NID:</label>
        <span>{{ $user->nid }}</span>
    </div>




    <!-- Add more profile information fields as needed -->
</div>