function goHome() {
    window.location.assign("../index.php"); 
}

//  dashbord file 
function showPage(pageId) {
    const pages = document.querySelectorAll('.dashbord-content');
    pages.forEach(page => page.style.display = 'none');
    document.getElementById(pageId).style.display = 'block';
}
