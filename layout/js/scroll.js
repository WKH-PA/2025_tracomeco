$(document).ready(function() {
    // Existing popup functionality
    $(".hinhanh_popup div.new_id_bs").click(function(event) {
        event.preventDefault();
        var targetId = $(this).attr('data-target');
        $(targetId).css({
            'visibility': 'visible',
            'opacity': '1'
        });
    });

    // Add download functionality to all images in popup
    $('.popup-box .content_croll img').each(function() {
        // Create container for image and download button
        var container = $('<div>').addClass('image-container position-relative');
        $(this).wrap(container);
        
        // Add download button
        var downloadBtn = $('<div>').addClass('icon--download position-absolute')
            .css({
                'bottom': '10px',
                'right': '10px',
                'z-index': '10'
            });
            
        var downloadLink = $('<a>')
            .attr({
                'href': $(this).attr('src'),
                'download': '',
                'title': 'Tải xuống'
            })
            .html('<i class="fal fa-arrow-to-bottom text-white"></i>');
            
        downloadBtn.append(downloadLink);
        $(this).parent().append(downloadBtn);
    });

    // Rest of your existing popup code...
    $('.popup-box .close').on('click', function(e) {
        e.stopPropagation();
        $(this).closest('.overlay-dark').css({
            'visibility': 'hidden',
            'opacity': '0'
        });
    });

    $('.popup-box').on('click', function(e) {
        e.stopPropagation();
    });

    // Handle download button click
    $(document).on('click', '.icon--download a', function(e) {
        e.stopPropagation();
        var imgUrl = $(this).attr('href');
        
        // Create virtual link to trigger download
        var link = document.createElement('a');
        link.href = imgUrl;
        link.download = imgUrl.split('/').pop();
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        
        return false;
    });

    // Remaining existing code...
    $(document).on('click', '.overlay-dark', function(e) {
        if (e.target === this) {
            $(this).css({
                'visibility': 'hidden',
                'opacity': '0'
            });
        }
    });

    $(document).keyup(function(e) {
        if (e.key === "Escape") {
            $('.overlay-dark').css({
                'visibility': 'hidden',
                'opacity': '0'
            });
        }
    });
});