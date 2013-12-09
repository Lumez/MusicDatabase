                <?php
                    if ($albumsAuthored->num_rows != 0) {
                    ?>
                    <table class="">
                        <tr>
                            <th>AlbumID</th>
                            <th>Title</th>
                            <th>Date</th>
                        </tr>
                        <?php
                            while ($album = $albumsAuthored->fetch_object()) {
                                include('partials/album.php');
                            }
                        ?>
                        </table>
                    <?php
                    } else {
                        ?>
                        <p>Musician has not authored any albums!</p>
                        <?php
                    }
                ?>