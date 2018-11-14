//open menu
document.querySelector('.menu-icon').addEventListener('click', function() {
    this.classList.toggle('open');
    document.querySelector('.menu').classList.toggle('dsp-none')
})

//change language
document.querySelector('.language-list').addEventListener('click', function(e) {
    if(e.target.nodeName !== 'LI') return;
    document.querySelectorAll('.language-item').forEach(function(item) {
        if(!item.classList.contains('language-selected')) return;
        item.classList.remove('language-selected');
    })
    e.target.classList.add('language-selected');
})

//select menu item
document.querySelectorAll('.menu-item').forEach(item => {
    if(item.children[1] === undefined) return;
    if(item.children[1].classList.contains('submenu')) {
        item.classList.add('menu-el-before');
    }

    if(!item.children[1].classList.contains('dsp-none')) {
        item.classList.add('menu-el-after');
    }
})

document.querySelector('.menu-list').addEventListener('click', function(e) {
    if(e.target.nodeName === 'A' && e.path[1].lastElementChild.classList.contains('submenu')) {
        e.path[1].lastElementChild.classList.toggle('dsp-none');
    }

    document.querySelectorAll('.menu-item').forEach(item => {
        if(item.children[1] === undefined) return;

        if(item.children[1].classList.contains('submenu') && (item.children[1].classList.contains('dsp-none')) ) {
            item.classList.add('menu-el-before');
            item.classList.remove('menu-el-after');
        }
    
        if(!item.children[1].classList.contains('dsp-none')) {
            item.classList.add('menu-el-after');
        }
       
    })
}, true);