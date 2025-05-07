@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="form-title text-center mb-4">Contactez-nous</h1>

    <!-- Informations de contact -->
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="contact_wrap shadow-sm rounded p-4 bg-light">
                <div class="contact_icon mb-2">
                    <i class="bi bi-geo-alt-fill fs-3"></i>
                </div>
                <div class="contact_text">
                    <span class="fw-bold">Adresse</span><br>
                    <a href="#" class="contact-link text-decoration-none">Rue des Rivageois 7, 4000 Liège</a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="contact_wrap shadow-sm rounded p-4 bg-light">
                <div class="contact_icon mb-2">
                    <i class="bi bi-envelope-open-fill fs-3"></i>
                </div>
                <div class="contact_text">
                    <span class="fw-bold">Adresse mail</span><br>
                    <a href="mailto:contact@maison-medicale.com" class="contact-link text-decoration-none">contact@gotickets.com</a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="contact_wrap shadow-sm rounded p-4 bg-light">
                <div class="contact_icon mb-2">
                    <i class="bi bi-telephone-fill fs-3"></i>
                </div>
                <div class="contact_text">
                    <span class="fw-bold">Téléphone</span><br>
                    <a href="tel:+32489470853" class="contact-link text-decoration-none">+32 489 47 08 53</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulaire -->
    <div class="section pt-0">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="border_form shadow-sm rounded p-4">
                        <h2 class="mb-4">Contactez-nous</h2>
                        <p class="leads">Une question, une remarque, une suggestion ? Nous nous ferons un plaisir de vous répondre dans les plus brefs délais.</p>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="name" class="form-control rounded-3" placeholder="Nom" value="{{ old('name') }}">
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="email" name="email" class="form-control rounded-3" placeholder="Email" value="{{ old('email') }}">
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="telephone" class="form-control rounded-3" placeholder="Téléphone" value="{{ old('telephone') }}">
                                    @error('telephone') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="sujet" class="form-control rounded-3" placeholder="Sujet" value="{{ old('sujet') }}">
                                    @error('sujet') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <textarea name="message" rows="4" class="form-control rounded-3" placeholder="Votre message">{{ old('message') }}</textarea>
                                    @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary w-100 py-2">Envoyer le message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Map -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Notre localisation</h2>
        <div class="map-responsive shadow rounded overflow-hidden" style="height: 400px;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2520.513829625765!2d5.576238115745652!3d50.63644497950257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c0f939ace6bd6d%3A0x3ec39e3702adbb91!2sRue%20des%20Rivageois%207%2C%204000%20Li%C3%A8ge%2C%20Belgium!5e0!3m2!1sfr!2sbe!4v1647695600000!5m2!1sfr!2sbe"
                width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen loading="lazy">
            </iframe>
        </div>
    </div>
</div>
@endsection
