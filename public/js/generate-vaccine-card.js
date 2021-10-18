
function generatevcard() {
    var element = document.getElementById('vaccine-card-html');
html2pdf(element);
    /*
    console.log("trigger");
    // Choose the element that our invoice is rendered in.
    const element = document.querySelector('#vaccine-card-html');
    var opt = {
        margin: 0.25,
        filename: 'vaccine-card.pdf',
        image: {type: 'jpeg', quality: 0.98},
        html2canvas: {scale: 2},
        jsPDF: {unit: 'in', format: 'A4', orientation: 'portrait'}
    };
    // Choose the element and save the PDF for our user.
    html2pdf().set(opt).from(element).save();
    */
        
}