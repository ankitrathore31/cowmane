@extends('admin.layout.AdminLayout')
@section('content')
    <style>
        .message-box {
            border-radius: 8px;
            padding: 30px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            min-height: 90vh;
        }

        textarea {
            resize: none;
        }

        .upload-box {
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 15px;
            text-align: center;
            position: relative;
            min-height: 200px;
            margin-top: 10px;
            background-color: #f8f9fa;
        }

        .upload-box.dragover {
            background-color: #e9f7ef;
            border-color: #28a745;
        }

        .note {
            color: red;
            font-size: 1rem;
            margin-top: 20px;
            font-weight: 500;
            font-size: 12px;
        }

        .progress-bar {
            width: 0;
            height: 5px;
            background-color: #28a745;
            transition: width 0.3s ease-in-out;
            margin-top: 8px;
        }

        .file-names {
            font-size: 0.9rem;
            margin-top: 5px;
            color: #333;
        }

        .preview-img {
            max-width: 30%;
            height: auto;
            margin-top: 10px;
            border-radius: 4px;
        }

        .preview-box {
            margin-top: 10px;
        }

        video,
        iframe {
            max-width: 30%;
            border-radius: 4px;
            margin-top: 10px;
        }
    </style>

    <div class="content-wrapper">
        {{-- <section class="content-header">
            <h1>Send Msg <small>Message</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="#">Admin</a></li>
                <li class="active">Send Message</li>
            </ol>
        </section> --}}

        <section class="content">
            <div class="container-fluid">
                <form method="POST">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-3 col-md-4 mb-4">
                            <label><strong>Numbers</strong></label>
                            <textarea class="form-control mb-4" rows="21" placeholder="Enter numbers..." wrap="soft"></textarea>
                        </div>

                        <!-- Right Column -->
                        <div class="col-lg-9 col-md-8">
                            <div class="mb-3">
                                <label><strong>Campaign Name</strong></label>
                                <input type="text" class="form-control" placeholder="Enter campaign name">
                            </div>

                            <div class="mb-4 mt-4">
                                <label><strong>Message Text</strong></label>
                                <textarea class="form-control" rows="6" placeholder="Enter your message..."></textarea>
                            </div>

                            <div class="row g-3 mb-4">
                                <!-- Image Upload -->
                                <div class="col-md-4">
                                    <label><strong>Image Upload</strong></label>
                                    <div class="upload-box" id="imageDrop" ondrop="handleDrop(event, 'image')"
                                        ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)">
                                        Drag & Drop images (max 2) or<br>
                                        <input type="file" id="imageInput" accept="image/*" multiple
                                            style="display:none;" onchange="handleFiles(this.files, 'image')" />
                                        <a href="#"
                                            onclick="document.getElementById('imageInput').click(); return false;">Browse
                                            Image</a>
                                        <small class="text-danger d-block mt-2">Max file size: 1 MB</small>
                                        <div class="progress-bar" id="imageProgress"></div>
                                        <div class="file-names" id="imageFiles"></div>
                                        <div class="preview-box" id="imagePreview"></div>
                                    </div>
                                </div>

                                <!-- Video Upload -->
                                <div class="col-md-4">
                                    <label><strong>Video Upload</strong></label>
                                    <div class="upload-box" id="videoDrop" ondrop="handleDrop(event, 'video')"
                                        ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)">
                                        Drag & Drop video (max 3 MB) or<br>
                                        <input type="file" id="videoInput" accept="video/*" style="display:none;"
                                            onchange="handleFiles(this.files, 'video')" />
                                        <a href="#"
                                            onclick="document.getElementById('videoInput').click(); return false;">Browse
                                            Video</a>
                                        <small class="text-success d-block mt-2">Max file size: 3 MB</small>
                                        <div class="progress-bar" id="videoProgress"></div>
                                        <div class="file-names" id="videoFiles"></div>
                                        <div class="preview-box" id="videoPreview"></div>
                                    </div>
                                </div>

                                <!-- PDF Upload -->
                                <div class="col-md-4">
                                    <label><strong>PDF Upload</strong></label>
                                    <div class="upload-box" id="pdfDrop" ondrop="handleDrop(event, 'pdf')"
                                        ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)">
                                        Drag & Drop PDF (max 2 MB) or<br>
                                        <input type="file" id="pdfInput" accept="application/pdf" style="display:none;"
                                            onchange="handleFiles(this.files, 'pdf')" />
                                        <a href="#"
                                            onclick="document.getElementById('pdfInput').click(); return false;">Browse
                                            PDF</a>
                                        <small class="text-info d-block mt-2">Max file size: 2 MB</small>
                                        <div class="progress-bar" id="pdfProgress"></div>
                                        <div class="file-names" id="pdfFiles"></div>
                                        <div class="preview-box" id="pdfPreview"></div>
                                    </div>
                                </div>
                            </div>

                            <p class="note fs-6">
                                <strong>Note:</strong> All campaigns will be processed between 10:00 AM to 6:00 PM on
                                working days.
                                Sending spam, abuse, or personal messages will result in credit suspension.
                            </p>
                                <!-- Submit Button (on bottom of textarea for all screens) -->
                                <div class="d-flex align-items-cente" style="margin-top: 10px;">
                                    <button type="submit" class="btn btn-primary me-3">Submit Now</button>
                                    {{-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="schedule">
                                        <label class="form-check-label" for="schedule">Schedule</label>
                                    </div> --}}
                                </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>

    <script>
        function handleDragOver(e) {
            e.preventDefault();
            e.currentTarget.classList.add("dragover");
        }

        function handleDragLeave(e) {
            e.preventDefault();
            e.currentTarget.classList.remove("dragover");
        }

        function handleDrop(e, type) {
            e.preventDefault();
            e.currentTarget.classList.remove("dragover");
            handleFiles(e.dataTransfer.files, type);
        }

        function handleFiles(files, type) {
            let maxSize = type === 'image' ? 1 : (type === 'video' ? 3 : 2); // MB
            let limit = type === 'image' ? 2 : 1;

            const filesArr = Array.from(files).slice(0, limit);
            const output = document.getElementById(`${type}Files`);
            const progress = document.getElementById(`${type}Progress`);
            const preview = document.getElementById(`${type}Preview`);
            output.innerHTML = "";
            preview.innerHTML = "";
            progress.style.width = "0%";

            let valid = true;
            filesArr.forEach(file => {
                if (file.size > maxSize * 1024 * 1024) {
                    output.innerHTML = `<span class="text-danger">File too large: ${file.name}</span>`;
                    valid = false;
                }
            });

            if (!valid) return;

            let progressVal = 0;
            const interval = setInterval(() => {
                if (progressVal >= 100) {
                    clearInterval(interval);
                    filesArr.forEach(file => {
                        output.innerHTML += `<div>${file.name}</div>`;
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            if (type === 'image') {
                                preview.innerHTML +=
                                    `<img src="${e.target.result}" class="preview-img" />`;
                            } else if (type === 'video') {
                                preview.innerHTML +=
                                    `<video controls src="${e.target.result}" width="100%"></video>`;
                            } else if (type === 'pdf') {
                                preview.innerHTML +=
                                    `<iframe src="${e.target.result}" width="100%" height="200px"></iframe>`;
                            }
                        };
                        reader.readAsDataURL(file);
                    });
                } else {
                    progressVal += 10;
                    progress.style.width = `${progressVal}%`;
                }
            }, 100);
        }
    </script>
@endsection
