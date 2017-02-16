jQuery(document).ready(function($) {
    var novi='0';
    $('#posalji').click(function() {


       var emaillog = $('#tbMail_stari_korisnik').val();
        var pasllog = $('#tbLozinka').val();
        var str = {
            email: emaillog,
            pass: pasllog
        };




            $.ajax({
                type: "POST",
                url: "function/logog.php",
                data: str,

                success: function (msg) {

                    if (msg == 'uspeh') {
                        $('#logoglas').hide();
                        $("#greska").html('<button class="btn btn-theme " style="border:2px solid white;" type="button" id="postavi" name="postavi">Καταχωρήστε</button>');

                    } else {
                        $("#greska").html(msg);
                        ferror = true;
                    }


                }
            });


    });

    $("#posalji2").click(function() {
        var emaillog = $('#tbMail_novi_korisnik').val();
        var pasllog = $('#tbLozinka_novi').val();
        var str = {
            email: emaillog,
            pass: pasllog
        };


        $.ajax({
            type: "POST",
            url: "function/logreg.php",
            data: str,

            success: function (msg) {

                if (msg == 'uspeh') {
                    $('#logoglas').hide();
                    $("#greska").html('</br><button class="btn btn-theme " style="border:2px solid white; color:white; background-color:#3333CC" type="button" id="postavi">Καταχωρήστε</button>');
                    novi='1';
                } else {
                    $("#greska").html(msg);
                    ferror = true;
                }


            }
        });
    });

    $("body").on("click","#postavi", function() {
        var emaillog = $('#tbMail_novi_korisnik').val();
        var pasllog = $('#tbLozinka_novi').val();
        var str = {
            email: emaillog,
            pass: pasllog
        };


        var f = $('form.validateoglas').find('.field'),
            ferror = false,
            emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;
        var jmbgexp = /^[0-9]{6,25}$/;
        var telexp = /^[0-9,+-/]{6,25}$/;
        var pibexp = /^\d{5,}$/;

        if ($('#chbIzvorniText').prop("checked") == false) {
            ferror = true;
            $('#chbIzvorniText').parent().find('div').html('Υποχρεωτικό πεδίο');
        } else {
            $('#chbIzvorniText').parent().find('div').html('');
        }

        if ($('#chbUsloviKor').prop("checked") == false) {
            ferror = true;
            $('#chbUsloviKor').parent().find('div').html('Υποχρεωτικό πεδίο');
        } else {
            $('#chbUsloviKor').parent().find('div').html('');
        }

        if ($('#chbGarancija').prop("checked") == false) {
            ferror = true;
            $('#chbGarancija').parent().find('.validation').html('Υποχρεωτικό πεδίο');
        } else {
            $('#chbGarancija').parent().find('.validation').html('');
        }

        if ($("input[name='radioTrajanje']:checked").val() == undefined) {
            ferror = true;
            $('#sss').parent().find('div').html('Υποχρεωτικό πεδίο');
        } else {
            $('#sss').parent().find('div').html('');
        }
        if ($("input[name='radioNacinOgl']:checked").val() == undefined) {
            ferror = true;
            $('#ncog').parent().find('div').html('Υποχρεωτικό πεδίο');
        } else {
            $('#ncog').parent().find('div').html('');
        }

        var a = $('#tbJmbg').val();
        if (!jmbgexp.test(a)) {
            ferror = true;
            $('#tbJmbg').parent().find('div').html('Υποχρεωτικό πεδίο');
            $('#tbJmbg').css("border-color", "#FF7770");
        } else {
            $('#tbJmbg').parent().find('div').html('');
            $('#tbJmbg').css("border-color", "#CCC");
        }

        var b = $('#tbKontakt').val();
        if (!telexp.test(b)) {
            ferror = true;
            $('#tbKontakt').parent().find('div').html('Υποχρεωτικό πεδίο');
            $('#tbKontakt').css("border-color", "#FF7770");
        } else {
            $('#tbKontakt').parent().find('div').html('');
            $('#tbKontakt').css("border-color", "#CCC");
        }

        var t = $('#tbTelefon').val();
        if (!telexp.test(t)) {
            ferror = true;
            $('#tbTelefon').parent().find('div').html('Υποχρεωτικό πεδίο');
            $('#tbTelefon').css("border-color", "#FF7770");
        } else {
            $('#tbTelefon').parent().find('div').html('');
            $('#tbTelefon').css("border-color", "#CCC");
        }

        var c = $('#tbPib').val();
        if (!pibexp.test(c)) {
            ferror = true;
            $('#tbPib').parent().find('div').html('Υποχρεωτικό πεδίο');
            $('#tbPib').css("border-color", "#FF7770");
        } else {
            $('#tbPib').parent().find('div').html('');
            $('#tbPib').css("border-color", "#CCC");
        }

        var w = $('#tbMaticniBr').val();
        if (!pibexp.test(w)) {
            ferror = true;
            $('#tbMaticniBr').parent().find('div').html('Υποχρεωτικό πεδίο');
            $('#tbMaticniBr').css("border-color", "#FF7770");
        } else {
            $('#tbMaticniBr').parent().find('div').html('');
            $('#tbMaticniBr').css("border-color", "#CCC");
        }


        f.children('input').each(function () {

            var i = $(this);

            var rule = i.attr('data-rule');

            if (rule != undefined) {
                var ierror = false;
                var pos = rule.indexOf(':', 0);
                if (pos >= 0) {
                    var exp = rule.substr(pos + 1, rule.length);
                    rule = rule.substr(0, pos);
                } else {
                    rule = rule.substr(pos + 1, rule.length);
                }

                switch (rule) {
                    case 'required':
                        if (i.val() == '') {
                            ferror = ierror = true;
                        }
                        break;

                    case 'maxlen':
                        if (i.val().length < parseInt(exp)) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'email':
                        if (!emailExp.test(i.val())) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'regexp':
                        exp = new RegExp(exp);
                        if (!exp.test(i.val())) {
                            ferror = ierror = true;
                        }
                        break;
                }
                i.next('.validation').html(( ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '' )).show('blind');
                if (ierror) {
                    i.css("border-color", "#FF7770");
                } else {
                    i.css("border-color", "#CCC");
                }
            }
        });
        f.children('textarea').each(function () {

            var i = $(this);
            var rule = i.attr('data-rule');

            if (rule != undefined) {
                var ierror = false;
                var pos = rule.indexOf(':', 0);
                if (pos >= 0) {
                    var exp = rule.substr(pos + 1, rule.length);
                    rule = rule.substr(0, pos);
                } else {
                    rule = rule.substr(pos + 1, rule.length);
                }

                switch (rule) {
                    case 'required':
                        if (i.val() == '') {
                            ferror = ierror = true;
                        }
                        break;

                    case 'maxlen':
                        if (i.val().length < parseInt(exp)) {
                            ferror = ierror = true;
                        }
                        break;
                }
                i.next('.validation').html(( ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '' )).show('blind');
                if (ierror) {
                    i.css("border-color", "#FF7770");
                } else {
                    i.css("border-color", "#CCC");
                }
            }
        });

        f.children('select').each(function () {

            var i = $(this);
            var rule = i.attr('data-rule');

            if (rule != undefined) {
                var ierror = false;
                var pos = rule.indexOf(':', 0);
                if (pos >= 0) {
                    var exp = rule.substr(pos + 1, rule.length);
                    rule = rule.substr(0, pos);
                } else {
                    rule = rule.substr(pos + 1, rule.length);
                }

                switch (rule) {
                    case 'required':
                        if (i.val() == '0') {
                            ferror = ierror = true;
                        }
                        break;

                    case 'maxlen':
                        if (i.val().length < parseInt(exp)) {
                            ferror = ierror = true;
                        }
                        break;
                }
                i.next('.validation').html(( ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '' )).show('blind');
                if (ierror) {
                    i.css("border-color", "#FF7770");
                } else {
                    i.css("border-color", "#CCC");
                }
            }
        });
        if (ferror != true) {

           var nazivfirme = $('#tbNazivFirme').val();
            var tbtext = $('#tbTekst').val();
            var kategorija = $('#kategorije').val();
            var podkategorija = $('#podKategorije').val();
            var tipoglasa = $('#tip_oglasa').val();
            var imeprezime = $('#tbImePrezime').val();
            var mail = $('#tbMail').val();
            var adresa = $('#tbAdresa').val();
            var drzava = $('#drzava').val();
            var grad = $('#grad').val();
            var nazivfirmedeklaracija = $('#tbNazivFirmeDek').val();
            var adresadeklaracija = $('#tbAdresaDek').val();
            var brregideklaracija = $('#tbBrReg').val();
            var opisdeklaracija = $('#tbOpis').val();
            var maticnideklaracija = $('#tbMaticniBr').val();
            var pib = $('#tbPib').val();
            var imeprezimeodglica = $('#tbImePrezimeOdgLica').val();
            var adresaodg = $('#tbAdresaStOdgLica').val();
            var jmbg = $('#tbJmbg').val();
            var brlic = $('#tbBrLicneKarte').val();
            var kontakt = $('#tbKontakt').val();
            var trajanjedeklaracije = $("input[name='radioTrajanje']:checked").val();
            var nacinoglasavanja = $("input[name='radioNacinOgl']:checked").val();
            var website = $('#tbWebsite').val();
            var slike=$('#slikeniz').val();
            var telefon=$('#tbTelefon').val();
            var str1 = {
                nazivfirme: nazivfirme,
                tbtext: tbtext,
                kategorija: kategorija,
                podkategorija: podkategorija,
                tipoglasa: tipoglasa,
                imeprezime: imeprezime,
                mail: mail,
                adresa: adresa,
                drzava: drzava,
                grad: grad,
                nazivfirmedeklaracija: nazivfirmedeklaracija,
                adresadeklaracija: adresadeklaracija,
                brregideklaracija: brregideklaracija,
                opisdeklaracija: opisdeklaracija,
                maticnideklaracija: maticnideklaracija,
                pib: pib,
                imeprezimeodglica: imeprezimeodglica,
                adresaodg: adresaodg,
                jmbg: jmbg,
                brlic: brlic,
                kontakt: kontakt,
                trajanjedeklaracije: trajanjedeklaracije,
                nacinoglasavanja:nacinoglasavanja,
                website: website,
                slike:slike,
                telefon:telefon
           }
          $.ajax({
                type: "POST",
                url: "function/postavljanje_oglasa1.php",
                data: str1,
                success: function (msg) {
                    if (msg == 'uspeh' && novi=='1') {

                   window.location.href = "success.php?verifikacija";
               }
               if (msg == 'uspeh' && novi=='0'){
           window.location.href = "success.php";
           }
                    else {
                        $("#greska").html(msg);
                        ferror = true;
                    }

                }
            });
        }
        else{

            $('button[name=postavi_standard]').hide();

            $("#greska").html('<Strong style="color: red;">Λάθος συμπληρωμένα στοιχεία!</Strong></br></br><button class="btn btn-theme " style="border:2px solid white;" type="button" id="postavi">Καταχωρήστε</button>');
        }





        return ferror != true;




    });
});