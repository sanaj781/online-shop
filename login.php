<div class="container-md text-center">
    <div class="login-page row align-content-center ">
        <div class=" col-md-4 offset-md-4 ">
            <h2 class="pt-4 pb-3">Login</h2>
            <form>
                <div class="mb-3 text-start">
                    <label for="exampleInputEmail1" class="form-label ">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3 text-start">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check text-start">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <!-- Modal for item added -->
                <div class="modal" id="modal-logged-in">

                    <div class="modal-wrapper row align-items-center">

                        <div class="added-info offset-md-3 col-md-6 col-12 p-5">
                            <p>This form has only front-end part of code implemented!</p>


                            <div class="text-center">
                                <a id="close-modal" class="btn btn-outline-success">OK, close</a>
                            </div>

                        </div>

                    </div>

                </div>

                <button type="submit" class="mb-2 btn btn-success">Submit</button>
                <button type="submit" class="mb-2 btn btn-secondary">Create an account</button>

            </form>

        </div>
    </div>
</div>
<script>
    $("form").on("submit", function(e) {
        e.preventDefault();
        if ($("#exampleInputPassword1").val().length !== 0 && $("#exampleInputEmail1").val().length !== 0) {

            $("#modal-logged-in").fadeIn("slow");
            $("body").css({
                overflow: "hidden",
            });
        } else {
            alert("Please enter your login and password")
        }

    });
    $("#close-modal").on("click", function() {
        $("#modal-logged-in").fadeOut("slow");
        $("body").css({
            overflow: "visible",
        });

    })
</script>