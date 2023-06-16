const decodedSurveyJson = decodeURIComponent(encodedSurveyJson);
const surveyJson = JSON.parse(decodedSurveyJson);
console.log(surveyJson);

const surveyContainer = document.getElementById('survey');

surveyJson.forEach(survey => {
    let string = '';
    for (let key in survey) {
        string += `<strong>${key}</strong>: ${survey[key]}<br>`;
    }
    surveyContainer.innerHTML += string + `<br><br>`;
});


