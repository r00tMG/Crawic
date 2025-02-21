$(document).ready(function() {

    $('input[type="checkbox"].square-blue').iCheck({
        checkboxClass: 'icheckbox_square-blue',
    });
    // Suppression des notifications après 5 secondes
    setTimeout(function() {
        $('#notific').remove();
    }, 5000);


    // Validation du formulaire d'inscription
    $('#register_form').bootstrapValidator({
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'Le prénom est requis'
                    },
                    stringLength: {
                        min: 3,
                        message: 'Le prénom doit contenir au moins 3 caractères'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'Le nom est requis'
                    },
                    stringLength: {
                        min: 3,
                        message: 'Le nom doit contenir au moins 3 caractères'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'L\'adresse email est requise'
                    },
                    emailAddress: {
                        message: 'L\'adresse email n\'est pas valide'
                    },
                    regexp: {
                        regexp: /^(\w+)([\-+.\'0-9A-Za-z_]+)*@(\w[\-\w]*\.){1,5}([A-Za-z]){2,6}$/,
                        message: 'L\'adresse email n\'est pas valide'
                    }
                }
            },
            email_confirm: {
                validators: {
                    notEmpty: {
                        message: 'La confirmation de l\'email est requise'
                    },
                    identical: {
                        field: 'email',
                        message: 'Les adresses email ne correspondent pas'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Le mot de passe est requis'
                    },
                    stringLength: {
                        min: 6,
                        message: 'Le mot de passe doit contenir au moins 6 caractères'
                    },
                    different: {
                        field: 'first_name,last_name',
                        message: 'Le mot de passe ne doit pas être identique au prénom ou au nom'
                    }
                }
            },
            password_confirm: {
                validators: {
                    notEmpty: {
                        message: 'La confirmation du mot de passe est requise'
                    },
                    identical: {
                        field: 'password',
                        message: 'Les mots de passe ne correspondent pas'
                    },
                    different: {
                        field: 'first_name,last_name',
                        message: 'Le mot de passe ne doit pas être identique au prénom ou au nom'
                    }
                }
            }
        }
    });

    // Revalidation en temps réel des champs
    $('#register_form input').on('keyup', function() {
        var pswd = $("#register_form input[name='password']").val();
        var pswd_cnf = $("#register_form input[name='password_confirm']").val();
        var email_cnf = $("#register_form input[name='email_confirm']").val();

        if (pswd != '') {
            $('#register_form').bootstrapValidator('revalidateField', 'password');
        }
        if (pswd_cnf != '') {
            $('#register_form').bootstrapValidator('revalidateField', 'password_confirm');
        }
        if (email_cnf != '') {
            $('#register_form').bootstrapValidator('revalidateField', 'email_confirm');
        }
    });

    // Gestion de la soumission du formulaire
    $('#register_form').on('success.form.bv', function(e) {
        e.preventDefault();
        var $form = $(e.target);

        // Envoi du formulaire via AJAX
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: $form.serialize(),
            success: function(response) {
                if (response.success) {
                    window.location.href = response.redirect;
                } else {
                    // Afficher les erreurs
                    alert(response.message || 'Une erreur est survenue');
                }
            },
            error: function(xhr) {
                // Gestion des erreurs
                var errors = xhr.responseJSON.errors;
                var errorMessage = '';
                for (var field in errors) {
                    errorMessage += errors[field].join('\n') + '\n';
                }
                alert(errorMessage || 'Une erreur est survenue');
            }
        });
    });

   
});