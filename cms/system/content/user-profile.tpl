<div class="card border-0">
    <div class="card-header bg-card" style="background-image: url('{$bg_image}') !important; background-size: cover !important;">
        <div class="d-flex align-items-md-start align-items-center flex-column flex-md-row w-100">
            <div class="m-3">
                <img src="{$avatar}" class="rounded-4" alt="">
            </div>
            <div class="ms-md-4 mt-md-0" style="color: var(--theme-color1)">
                <div class="float-end">
                    <button class="btn btn-sm btn-primary">Edit Profile</button>
                    <button class="btn btn-sm btn-dark">Message</button>
                </div>
                <h4 class="mt-3 mb-1">{$name}</h4>
                <p>{$user_email}</p>
                <span class="text-primary">{$bio} 🚀</span>
            </div>
        </div>
    </div>
</div>

<form method="post" action="">
    <label for="new_name">New Name:</label>
    <input class="form-control" type="text" id="new_name" name="new_name" value="{$name}" required>
    <br>
    <label for="new_bio">New Bio:</label>
    <textarea class="form-control" id="new_bio" name="new_bio" required>{$bio}</textarea>
    <br>
    <button type="submit" class="btn btn-primary w-100">Save</button>
</form>