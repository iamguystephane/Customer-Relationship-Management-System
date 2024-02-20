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

let projectDescription = document.querySelector("#description");
function viewDescription()
{
    projectDescription.style.display = "block";
}
function HideDescription()
{
    projectDescription .style.display = "none";
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

// upload image section


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

// customer section

function newProject()
{
    document.querySelector(".main-section").style.display = "block";
}

function closeCreateProject()
{
    document.querySelector(".main-section").style.display = "none";
}