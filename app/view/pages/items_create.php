<?php require_once '../../../config/config.php' ?>
<?php include '../layout/header.php' ?>
<?php include '../components/navbar.php' ?>

<main>
    <section class="page-title">
        <h1 class="page-header">Item Creation</h1>
        <h2>Add Your Items To Power Up Your Journey</h2>
    </section>

    <section class="content-select-container">
        <div class="content-select-bg content-detail-bg">

                <!-- Atas: Upload foto kiri + Input kanan -->
                <div class="content-detail-top">

                    <div class="content-create-portrait">
                        <label for="portrait-input" class="portrait-upload-label" id="portrait-label">
                            <div class="portrait-placeholder" id="portrait-placeholder">
                                <i class="fa-solid fa-plus"></i>
                                <span>Add Portrait</span>
                            </div>
                            <img id="portrait-preview" src="" alt="Preview" style="display:none;">
                        </label>
                    </div>

                    <div class="content-detail-info">
                        <div class="info-row input-row">
                            <input type="text" name="name"
                                   placeholder="Insert Name" required>
                        </div>
                        <div class="info-row input-row">
                            <input type="text" name="occupation"
                                   placeholder="Insert Occupation" required>
                        </div>
                        <div class="info-row input-row">
                            <input type="text" name="home"
                                   placeholder="Insert Home" required>
                        </div>
                        <div class="info-row input-row">
                            <input type="text" name="species"
                                   placeholder="Insert Species" required>
                        </div>
                    </div>

                </div>

                <!-- Bawah: Textarea deskripsi -->
                <div class="content-detail-desc">
                    <label class="desc-label">Add Description</label>
                    <textarea name="description" rows="5"
                              placeholder="Write character description here..."></textarea>
                </div>

                <!-- Tombol Submit -->
                <div class="create-actions">
                    <a href="character.php" class="btn-cancel">Cancel</a>
                    <button type="submit" class="btn-save">Save Item</button>
                </div>

            </form>

        </div>
    </section>
</main>

<?php include '../layout/footer.php' ?>