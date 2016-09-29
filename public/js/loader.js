function startLoading(){
    var loader = $("#loading").introLoader({
        animation: {
            name: 'simpleLoader',
            options: {
                effect:'slideUp',
                ease: "easeInOutCirc",
                style: 'dark',
                delayTime: 1000, //delay time in milliseconds
                animationTime: 500
            }
        },

        spinJs: {
            lines: 13, // The number of lines to draw
            length: 20, // The length of each line
            width: 10, // The line thickness
            radius: 30, // The radius of the inner circle
            corners: 1, // Corner roundness (0..1)
            color: '#26df93', // #rgb or #rrggbb or array of colors
        }
    });
}

function endLoading(){
    $("#loading").removeClass("introLoader simpleLoader theme-dark");
    $("#loading").empty();
}
