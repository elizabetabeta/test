@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
           <!-- <div class="col-md-3">

            </div>
            <div class = "col-md-9"> -->


            <section class="mb-4 ms-5">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-light text-center my-4">Kontaktiraj nas!</h2>
    <!--Section description-->
    <p class="text-center w-responsive text-light mx-auto mb-5"> Imaš pitanja? Kontaktiraj nas i pričaj sa nama direktno!
        Naš tim će vam odgovoriti što prije moguće.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name2" name="name" class="form-control">
                            <label for="name" class="text-light">Vaše ime</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email2" name="email" class="form-control">
                            <label for="email" class="text-light">Vaš email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="text-light">Predmet</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message" class="text-light">Vaša poruka</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class="text-center text-md-left">
                <a href="mailto:#" class="btn btn-primary">Send</a>
            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center text-light">
            <ul class="list-unstyled mb-0">
                <li><i class="bi bi-geo-alt"></i>
                    <p>Tamo tamo daleko</p>
                </li>

                <li><i class="bi bi-telephone"></i>
                    <p>+ 2345 678 901</p>
                </li>

                <li><i class="bi bi-envelope"></i>
                    <p>contact@email.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>

               <h1 class="text text-light text-center mt-5 font-weight-bold">O nama</h1>

               <div class="card mb-3 mt-3" style="max-width: 550px;">
                   <div class="row g-0">
                       <div class="col-md-4">
                           <img style="height: 300px;padding: 5px"
                                src="Ivona.jpg" class="img-fluid rounded-start" alt="...">
                       </div>
                       <div class="col-md-8">
                           <div class="card-body">
                               <h5 class="card-title">Ivona Krezić</h5>
                               <p class="card-text">
                                   Studentica 3. godine informatike
                                   Imam 22 godine, dolazim iz Mostara.
                                   Slobodno vrijeme nastojim iskoristiti sto
                                   efektivnije, tako da se bavim sportom,
                                   vozim biciklo, boksam, družiti se sa
                                   prijateljima, putujem, te učim
                                   uvijek nešto novo pretražujući internet.
                               </p>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="card mb-3 mt-3" style="max-width: 550px;">
                   <div class="row g-0">
                       <div class="col-md-5">
                           <img style="height: 260px;padding: 5px"
                                src="Elizabeta.jpg" class="img-fluid rounded-start mt-2" alt="...">
                       </div>
                       <div class="col-md-7">
                           <div class="card-body">
                               <h5 class="card-title">Elizabeta Miličević</h5>
                               <p class="card-text">
                                   Studentica 3. godine informatike
                                   Imam 22 godine, dolazim iz Kiseljaka.
                                   U slobodno vrijeme volim crtati, svirati klavir,
                                   čitati knjige i provoditi vrijeme sa svojim
                                   prijateljima.
                               </p>
                           </div>
                       </div>
                   </div>
               </div>
<!--Section: Contact v.2-->
            </div>
        </div>
@endsection
