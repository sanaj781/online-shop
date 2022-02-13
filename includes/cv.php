    <div class="container-md">
        <div class="row p-3">
            <div class="offset-4 col-4 text-center toggle-cv">
                <a class="link-secondary text-decoration-none" href="" style="color: #016e6e;">
                    About me<i class="ms-2 fst-normal bi bi-arrow-bar-down">

                    </i>
                </a>
            </div>
            <div class="col-4 text-end g-0">
                <a class="link-secondary text-decoration-none" href="Denys Shevchenko CV ENG.pdf" style="color: #016e6e">My CV</a>
            </div>

        </div>
        <div class="" id="portfolio-toggle">

            <div class="row about-me-section ">
                <div class="col-12 col-xl-4 col-lg-5 text-center">
                    <img src="images/CV/cv-small.jpg" class="img-fluid avatar">

                </div>
                <div class="col-12 col-xl-8 col-lg-7 cv-desc pt-4">
                    <p>Hi there!</p>

                    <p>My name is Denys. In order to demonstrate my current skills in web-developing I created this responsive web-page using Bootstrap 5, HTML&CSS, JavaScript,
                        jQuery, PHP and MySQL.
                        I chose to build an online store for my portfolio, as it suits perfect to demonstrate different skills related to web-developing. </p>
                    <p>
                        I find myself enjoying the process of coding, and I want to dive deeper into web-developing and turn my hobby into a career.</p>
                    <p>I would be happy to cooperate with you if you are looking for a web-developer. Furthermore, I already have permanent residence permit to live
                        in Poland (Zezwolenie na pobyt rezydenta długoterminowego UE) and I can speak Polish fluently!
                        Also, as a foreigner I do not need any additional permissions to work in Poland!
                    </p>
                    <p> Just let me know if you are interested in cooperation with me! You will find my contact details in the attached CV file <a style="color: #016e6e" class="text-decoration-none" href="Denys Shevchenko CV ENG.pdf"> here </a>or on the right side of this page!</p>
                </div>
                <div class="col-12 toggle-cv text-center bn">
                    <a style="color: #016e6e" class="link-secondary text-decoration-none" href="">

                        <p class="d-none d-md-inline-block pe-1">Hide info</p> <i class="bi bi-arrow-bar-up"></I>
                    </a>
                </div>

            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $("#portfolio-toggle").hide();
            $(".toggle-cv").click(function(e) {
                e.preventDefault();
                $("#portfolio-toggle").toggle("quick");
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });


        });
    </script>