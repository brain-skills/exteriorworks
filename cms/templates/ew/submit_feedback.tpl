<form method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="form-grp">
                <input name="name" type="text" placeholder="Full Name*">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-grp">
                <input name="email" type="email" placeholder="Email*">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-grp">
                <input name="phone" type="text" placeholder="Phone*">
            </div>
        </div>
        <div class="col-md-6">
            <select class="form-control" name="subject">
                <option value="Free Estimate" selected>Free Estimate</option>
                <option value="Other question">Other question</option>
            </select>
        </div>
    </div>
    <div class="form-grp">
        <textarea id="message" placeholder="Your Message here"></textarea>
    </div>
    <button class="btn" type="submit" name="submit_feedback">Send Message</button>
</form>