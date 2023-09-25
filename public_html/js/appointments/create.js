let $doctor, $date, $specialty, $hours;
let iRadio;

const noHoursAlert=    `<div class="alert alert-danger" role="alert">
                            El médico no tiene horas diponibles para esas fechas!
                        </div>`;

$(function () {

    $specialty= $('#specialty');
    $date= $('#date');
    $doctor= $('#doctor');
    $hours= $('#hours');

    $specialty.change(()=> {

        const specialtyId= $specialty.val();
        const url= `/specialties/${specialtyId}/doctors`;
        $.getJSON(url, onDoctorsLoaded);
    });

    $doctor.change(loadHours);
    $date.change(loadHours);
});


function onDoctorsLoaded(doctors){
    let htmlOptions= '';

    doctors.forEach(doctor => {
        htmlOptions+= `<option value="${doctor.id}">${doctor.name}</option>`;
    });
    $doctor.html(htmlOptions);
    loadHours(); // side-effect
};

function loadHours(){
    $doctor= $('#doctor');
    const selectedDate= $date.val();
    const doctorId= $doctor.val();
    const url= `/schedule/hours?date=${selectedDate}&doctor_id=${doctorId}`;
    $.getJSON(url, displayHours);
}

function displayHours(data){
    if(!data. morning && !data.afternoon){
        $hours.html(noHoursAlert);
        return;
    }

    let htmlHours= '';
    iRadio= 0;

    if(data.morning){
        const morning_intervals= data.morning;
        morning_intervals.forEach(interval => {
            htmlHours+= getRadioIntervalHtml(interval);
        });
    }

    if(data.afternoon){
        const afternoon_intervals= data.afternoon;
        afternoon_intervals.forEach(interval => {
            htmlHours+= getRadioIntervalHtml(interval);
        });
    }
    $hours.html(htmlHours);

    function getRadioIntervalHtml(interval){
        const text= `${interval.start} - ${interval.end}`;
        return `<div class="custom-control custom-radio mb-3">
                    <input name="scheduled_time" class="custom-control-input" id="interval-${iRadio}" type="radio" value="${interval.start}" required>
                    <label class="custom-control-label" for="interval-${iRadio++}">${text}</label>
                </div>`;
            }
}
