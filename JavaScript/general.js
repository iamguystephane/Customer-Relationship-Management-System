let hideViewRequest = document.querySelector("#view_request")

function toHomePage()
{
    hideViewRequest.style.display = "none"
    recordCreate.style.display = "none"
}

function viewRequests()
{
     hideViewRequest.style.display = "block"
               
}

let completedProject = document.querySelector("#uncompleted-project");
function uncompletedJob()
{
    completedProject.style.display = "block";
}

function HideUncompletedJob()
{
    completedProject.style.display = "none";
}


// JavaScript for the contact page
let recordCreate = document.querySelector(".add-record-page")

function createRecord()
{
    recordCreate.style.display = "block"
} 
function Back()
{
    recordCreate.style.display = "none"
}

let recordUpdate = document.querySelector(".update-record-page")
function updateRecord()
{
    recordUpdate.style.display = "block"
}
function goBack()
{
    recordUpdate.style.display = "none"
}

// This is the line underneath each tab on the side bar...

let dashboardLine = document.querySelector(".line-dashboard");
function dashboardClick()
{
    dashboardLine.style.display = "block";
}

// upload image section

//administrator side image upload
let uploadImage = document.querySelector("#input-file")
let uploaded_image = "";
uploadImage.addEventListener("change", function()
{
    let reader = new FileReader();
    reader.addEventListener("load", () =>
    {
        uploaded_image = reader.result
        document.querySelector(".image").style.backgroundImage = `url(${uploaded_image})`
    })
    reader.readAsDataURL(this.files[0])
})

//Customer side image upload
let uploadimage = document.querySelector("#enterFile")
let uploaded_Image = "";
uploadimage.addEventListener("change", function()
{
    let read = new FileReader();
    read.addEventListener("load", () =>
    {
        uploaded_Image = read.result
        document.querySelector(".image2").style.backgroundImage = `url(${uploaded_Image})`
    })
    read.readAsDataURL(this.files[0])
})

// customer section

function newProject()
{
    document.querySelector(".main-section").style.display = "block";
}

function closeCreateProject()
{
    document.querySelector(".main-section").style.display = "none";
}


// create account section
document.querySelector('#myForm').addEventListener('submit', function(event)
 {
    var integerInput = document.querySelector('.label-email');
    var integerError = document.querySelector('#integerError');

    // Define a simple integer validation regex
    var integerRegex = /^\d+$/;

    // Check if the entered value is composed of only digits
    if (!integerRegex.test(integerInput.value)) {
        integerError.textContent = 'Invalid input. Please enter only integer characters.';
        event.preventDefault(); // Prevent form submission
    } 
    else 
    {
        integerError.textContent = ''; // Clear error message
    }
 });

//  logout
//Note that if the javaScript code below this comment doesn't apply, just comment the above code to make it applicable