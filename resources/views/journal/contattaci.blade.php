@extends('layouts.menubar')

@section('content')

<div class="container-fluid mb-4">
    <div class="container">
        <div class="col-12 text-center contact_margin_svnit ">
            <div class="text-center fh5co_heading py-2">Scrivici</div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <form class="row" id="fh5co_contact_form">
                    <div class="col-12 py-3">
                        <input type="text" class="form-control fh5co_contact_text_box" placeholder="Nome" />
                    </div>
                    <div class="col-6 py-3">
                        <input type="text" class="form-control fh5co_contact_text_box" placeholder="E-mail" />
                    </div>
                    <div class="col-6 py-3">
                        <input type="text" class="form-control fh5co_contact_text_box" placeholder="Oggetto" />
                    </div>
                    <div class="col-12 py-3">
                        <textarea class="form-control fh5co_contacts_message" placeholder="Messaggio"></textarea>
                    </div>
                    <div class="col-12 py-3 text-center"> <a href="#" class="btn contact_btn">Invia</a> </div>
                </form>
            </div>
            <div class="col-12 col-md-6 align-self-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1019606.8850316438!2d29.36480093676515!3d-3.389367669747555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19c144d33654f15b%3A0xb1234d0e5631ec8d!2sBurundi!5e0!3m2!1sit!2sit!4v1617269942930!5m2!1sit!2sit" class="map_sss" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
