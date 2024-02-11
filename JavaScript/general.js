let hideViewRequest = document.querySelector("#view_request")

function toHomePage()
{
    hideViewRequest.style.display = "none"
    recordCreate.style.display = "none"
}

function uncompletedJob()
{
     hideViewRequest.style.display = "block"
               
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