/* ---------------------------------------------
 Make A Referral form
 --------------------------------------------- */
$(document).ready(function(){
    $("#makeareferral_submit_btn").click(function(){
        
        //get input field values
        var user_firstname = $('input[name=FirstName]').val();
        var user_lastname = $('input[name=LastName]').val();
        var user_gender = $('input[name=Gender]').val();
        var user_dob = $('input[name=dob]').val();
        var user_participantEmail = $('input[name=participantEmail]').val();
        var user_PhoneNumber = $('input[name=PhoneNumber]').val();
        var user_NDISNumber = $('input[name=NDISNumber]').val();
        var user_PlanStartDate = $('input[name=PlanStartDate]').val();
        var user_PlanEndDate = $('input[name=PlanEndDate]').val();
        var user_Livingarrangements = $('input[name=Livingarrangements]').val();
        var user_PreferredLanguage = $('input[name=PreferredLanguage]').val();
        var user_PrimaryDisability = $('input[name=PrimaryDisability]').val();
        var user_ComorbidDisability = $('input[name=ComorbidDisability]').val();
        var user_PleaselistNDISgoals = $('textarea[name=PleaselistNDISgoals]').val();
        var user_FundingAllocation = $('textarea[name=FundingAllocation]').val();
        var user_SafetyConcerns = $('textarea[name=SafetyConcerns]').val();
        var user_AdditionalComments = $('textarea[name=AdditionalComments]').val();

        var user_AddressLine1 = $('input[name=AddressLine1]').val();
        var user_AddressLine2 = $('input[name=AddressLine2]').val();
        var user_Suburb = $('input[name=Suburb]').val();
        var user_State = $('select[name=State]').val();
        var user_Postcode = $('input[name=Postcode]').val();
        var user_Country = $('input[name=Country]').val();
        var user_PrimaryContactFullName = $('input[name=PrimaryContactFullName]').val();
        var user_Relationshiptoclient = $('input[name=Relationshiptoclient]').val();
        var user_SupportCoordinatorFullName = $('input[name=SupportCoordinatorFullName]').val();
        var user_SupportCoordinatorCompany = $('input[name=SupportCoordinatorCompany]').val();
        var user_supportCoordinatorPhoneNumber = $('input[name=supportCoordinatorPhoneNumber]').val();
        var user_supportCoordinatorEmail = $('input[name=supportCoordinatorEmail]').val();
        var user_PlanManagerFullName = $('input[name=PlanManagerFullName]').val();
        var user_PlanManagerCompany = $('input[name=PlanManagerCompany]').val();
        var user_PlanManagerPhoneNumber = $('input[name=PlanManagerPhoneNumber]').val();
        var user_PlanManagerEmail = $('input[name=PlanManagerEmail]').val();

        var user_NDIAManagedPlan = $('input[name=NDIAManagedPlan]').val();
        var user_SelfManagedPlan = $('input[name=SelfManagedPlan]').val();
        var user_additionaldocuments = $('input[name=additionaldocuments]').val();
        
        var checkboxes = document.getElementsByName('ServicesRequired');
        var vals = "";
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            if (checkboxes[i].checked) {
                vals += "," + checkboxes[i].value;
            }
        }
        if (vals) vals = vals.substring(1);
        var ServicesRequiredcheckedValues = vals.toString();
        
       

        //var user_ = $('textarea[name=]').val();
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        if (user_firstname == "") {
            $('input[name=FirstName]').css('border-color', '#e41919');
            proceed = false;
        }
        if (user_lastname == "") {
            $('input[name=LastName]').css('border-color', '#e41919');
            proceed = false;
        }        
        if (user_dob == "") {
            $('textarea[name=dob]').css('border-color', '#e41919');
            proceed = false;
        }
        if (user_PhoneNumber == "") {
            $('textarea[name=PhoneNumber]').css('border-color', '#e41919');
            proceed = false;
        }
        if (user_NDISNumber == "") {
            $('textarea[name=NDISNumber]').css('border-color', '#e41919');
            proceed = false;
        }
        if (user_AddressLine1 == "") {
            $('textarea[name=AddressLine1]').css('border-color', '#e41919');
            proceed = false;
        }
        if (user_Suburb == "") {
            $('textarea[name=Suburb]').css('border-color', '#e41919');
            proceed = false;
        }
        if (user_Postcode == "") {
            $('textarea[name=Postcode]').css('border-color', '#e41919');
            proceed = false;
        }
        if (user_PrimaryContactFullName == "") {
            $('textarea[name=PrimaryContactFullName]').css('border-color', '#e41919');
            proceed = false;
        }

        
        //everything looks good! proceed...
        if (proceed) {
            //data to be sent to server
            postdata = {
                'FirstName': user_firstname,
                'LastName': user_lastname,
                'Gender': user_gender,
                'dob': user_dob,
                'ParticipantEmail': user_participantEmail,
                'PhoneNumber': user_PhoneNumber,
                'NDISNumber': user_NDISNumber,
                'PlanStartDate': user_PlanStartDate,
                'PlanEndDate': user_PlanEndDate,
                'Livingarrangements': user_Livingarrangements,
                'PreferredLanguage': user_PreferredLanguage,
                'PrimaryDisability': user_PrimaryDisability,
                'ComorbidDisability': user_ComorbidDisability,
                'PleaselistNDISgoals': user_PleaselistNDISgoals,
                'FundingAllocation': user_FundingAllocation,
                'SafetyConcerns': user_SafetyConcerns,
                'AdditionalComments': user_AdditionalComments,
                'AddressLine1': user_AddressLine1,
                'AddressLine2': user_AddressLine2,
                'Suburb': user_Suburb,
                'State': user_State,
                'Postcode': user_Postcode,
                'Country': user_Country,
                'PrimaryContactFullName': user_PrimaryContactFullName,
                'Relationshiptoclient': user_Relationshiptoclient,
                'SupportCoordinatorFullName': user_SupportCoordinatorFullName,
                'SupportCoordinatorCompany': user_SupportCoordinatorCompany,
                'supportCoordinatorPhoneNumber': user_supportCoordinatorPhoneNumber,
                'supportCoordinatorEmail': user_supportCoordinatorEmail,
                'PlanManagerFullName': user_PlanManagerFullName,
                'PlanManagerCompany': user_PlanManagerCompany,
                'PlanManagerPhoneNumber': user_PlanManagerPhoneNumber,
                'PlanManagerEmail': user_PlanManagerEmail,
                'ServicesRequired': ServicesRequiredcheckedValues,
                'NDIAManagedPlan': user_NDIAManagedPlan,
                'SelfManagedPlan': user_SelfManagedPlan,
                'AdditionalDocuments': user_additionaldocuments
                
            };
            
            //Ajax post data to server
            $.post('make_a_referral.php', postdata, function(response){
            
                //load json data from server and output message     
                if (response.type == 'error') {
                    output = '<div class="error">' + response.text + '</div>';
                }
                else {
                
                    output = '<div class="success">' + response.text + '</div>';
                    
                    //reset values in all input fields
                    $('#makeareferral_form input').val('');
                    $('#makeareferral_form textarea').val('');
                }
                
                $("#makeareferral_result").hide().html(output).slideDown();
            }, 'json');
            
        }
        
        return false;
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("#makeareferral_form input, #makeareferral_form textarea").keyup(function(){
        $("#makeareferral_form input, #makeareferral_form textarea").css('border-color', '');
        $("#makeareferral_result").slideUp();
    });
    
});
