<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<!-- Title -->
<title>Wordbank - Landingpage</title>
<!-- Favicon -->
<link rel="icon" href="{{ asset('front_assets/img/logo/wordbank-logo.svg')}}">
<!-- Stylesheet -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('front_assets/style.css')}}">
<link rel="stylesheet" href="{{ asset('front_assets/uicon/uicon-rounded.css')}}">
<link rel="stylesheet" href="{{ asset('front_assets/responsive.css')}}">
<link rel="stylesheet" href="{{ asset('front_assets/typostyle.css')}}">

<script>
    const creator_base_url = '{{ env("CREATOR_BASE_URL")."/api"  }}';
    const creator_app_token = '{{ env("WORDBANK_CREATOR_TOKEN") }}';
    const showAlert = (message, type)=>{
        document.querySelector('#alert-holder').innerHTML =`
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            <strong>Alert: </strong>${message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="false">&times;</span>
            </button>
        </div>`
    }
</script>
