<div class="container-md text-center border-section pb-5 pt-4">
    <div class="row">

        <div class="col-md-12 col-lg-6 pb-3">
            <h2 class="pb-3">Our adress</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2438.6452659863303!2d21.10330831574952!3d52.322439158603956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecfcbd74e9cbf%3A0xe7999d5aed84b6d7!2sMarki!5e0!3m2!1sen!2spl!4v1633367446526!5m2!1sen!2spl" width="100%" height="600" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="col-md-12 col-lg-6 text-start ">
            <h2 class="text-center pb-3">Leave us a message</h2>
            <form id="contact">
                <div class="pb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label for="FormControlTextarea1" class="form-label">Your message</label>
                    <textarea class="form-control" id="FormControlTextarea" rows="3"></textarea>
                    <button id="send-message" type="submit" class="btn-success btn-lg col-12 mt-4">Send</button><br />
                </div>
            </form>
            <div class="text-center">
                <h2 class="pt-3 text-center pb-3">Our store:</h2>
                Marki
                al. Marszałka Józefa Piłsudskiego 96, 05-260 Marki
                <p>PHONE:

                    +1 234 567 891
                </p>
                <p>E-MAIL:

                    office@example.org</p>

                Store hours:<br>

                Mon to Sat: 10 AM – 5:30 PM
            </div>
        </div>

    </div>
</div>

<div class="modal" id="modal-message-sent">

    <div class="modal-wrapper row align-items-center text-center">

        <div class="added-info offset-md-3 col-md-6 col-12 p-5">
            <p id="textMessage"></p>


            <div class="text-center">
                <a class="btn btn-success">Continue shoping</a>
            </div>

        </div>

    </div>

</div>

<script>
    $(document).ready(function() {

        $("#contact").on("submit", function(e) {
            e.preventDefault();


            if ($("#FormControlTextarea").val().length !== 0 && $("#exampleInputEmail1").val().length !== 0) {
                $("#textMessage").text("Thank you for your message! We will contact you as soon as posible!");
                $("#FormControlTextarea").val('');
                $("#exampleInputEmail1").val('');

                $("#modal-message-sent").fadeIn("slow", function() {
                    $("body").css({
                        "overflow": "hidden"
                    });

                });

            }

        });

        $("#modal-message-sent").click(function() {
            $("#modal-message-sent").fadeOut("slow", function() {
                $("body").css({
                    "overflow": "visible"
                });

            });
        });
    })
</script>