(() => {
    const $elm = document;

    class Favorite {
        constructor(obj) {

            const $trigger = $elm.getElementsByClassName(obj.className);
            const triggerLen = $trigger.length;

            let index = 0;
            while (index < triggerLen) {
                $trigger[index].addEventListener('click', (e) => this.clickHandler(e));
                index++;
            }
        }

        clickHandler(e) {
            e.preventDefault();
            const $target = e.currentTarget;
            const $postId = $target.getAttribute('post_id');
            const $favoCount = $target.nextElementSibling;
            const countInt = Number($favoCount.textContent);

            if ($target.style.animationPlayState === 'running') {
                $target.style.animationPlayState = 'paused';
            }

            if ($target.classList.contains('favo_btn') === true) {

                $target.classList.remove('bi-suit-heart', 'favo_btn');
                $target.style.animationPlayState = 'running';
                $target.classList.add('bi-suit-heart-fill', 'unfavo_btn');

                let token = $elm.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let url = $target.getAttribute('data-route');

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                    },
                    data: {
                        post_id: $postId,
                    },
                }).then((Response) => {
                    if (Response.ok) {
                        return Response.json();
                    }
                    throw new Error();
                    console.log(Response);
                }).then((json) => {
                    $favoCount.textContent = countInt + 1;
                }).catch((error) => {
                    throw new Error();
                    console.log(Response);
                });
            }
        }
    }

    const Favo = new Favorite({
        className: 'favo_btn',
    });

    class Unfavorite {
        constructor(obj) {

            const $trigger = $elm.getElementsByClassName(obj.className);
            const triggerLen = $trigger.length;

            let index = 0;
            while (index < triggerLen) {
                $trigger[index].addEventListener('click', (e) => this.clickHandler(e));
                index++;
            }
        }

        clickHandler(e) {
            e.preventDefault();
            const $target = e.currentTarget;
            const $postId = $target.getAttribute('post_id');
            const $favoCount = $target.nextElementSibling;
            const countInt = Number($favoCount.textContent);

            if ($target.style.animationPlayState === 'running') {
                $target.style.animationPlayState = 'paused';
            }

            if ($target.classList.contains('unfavo_btn') === true) {
                $target.classList.remove('bi-suit-heart-fill', 'unfavo_btn');
                $target.style.animationPlayState = 'running';
                $target.classList.add('bi-suit-heart', 'favo_btn');

                let token = $elm.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let url = $target.getAttribute('data-route');

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                    },
                    data: {
                        post_id: $postId,
                    },
                }).then((Response) => {
                    if (Response.ok) {
                        return Response.json();
                    }
                    throw new Error();
                    console.log(Response);
                }).then((json) => {
                    $favoCount.textContent = countInt - 1;
                }).catch((error) => {
                    throw new Error();
                    console.log(Response);
                });
            }
        }
    }

    const unfavo = new Unfavorite({
        className: 'unfavo_btn',
    });

    //SCROLL BTN DISPLAY    
    const $scrollUpBtn = $elm.getElementById('js_scrollUp-btn');

    window.addEventListener('scroll', () => {
        let scrollY = window.scrollY;
        
        if(scrollY >= 200){
            $scrollUpBtn.classList.add('is_active');
        }else if(scrollY < 200 && $scrollUpBtn.classList.contains('is_active') === true){
            $scrollUpBtn.classList.remove('is_active');
        }
        
    });

    //SCROLL UP EVENT
    $scrollUpBtn.addEventListener('click', () => {
        window.scroll({ top: 0 });

    });

})();

// (() => {
//     const $elm = document;
//     const $mainCategories = $elm.getElementsByClassName('main_category_list');
//     const mainCategoriesLen = $mainCategories.length;

//     let index = 0;
//     while (index < mainCategoriesLen) {
//         $mainCategories[index].addEventListener('click', (e) => this.accordion(e));
//         index++;
//     }

//     accordion = (e) => {
//         e.preventDefault();

//         const $trigger = e.currentTarget;
//         const $target = $trigger.nextElementSibling;

//         if ($target.classList.contains('is_active') === true) {
//             $target.classList.remove('is_active');
//         } else {
//             $target.classList.add('is_active');
//         }
//     }

// })();