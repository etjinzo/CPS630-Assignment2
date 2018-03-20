<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "cps630assignment2";

// TODO: Create tables

$conn = new mysqli($servername, $username, $password, $dbname);

// Create Image_s
$sql = "CREATE TABLE Image_s (
	images_id INT(100) UNSIGNED NOT NULL AUTO_INCREMENT,
	image_s VARCHAR(100) NOT NULL,
	PRIMARY KEY(images_id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Images created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Create Image_l
$sql = "CREATE TABLE Image_l (
  imagel_id INT(100) UNSIGNED NOT NULL AUTO_INCREMENT,
  image_l VARCHAR(100) NOT NULL,
  PRIMARY KEY (imagel_id)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Image_l created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Create Galleries
$sql = "CREATE TABLE Galleries (
	gallery_id INT(100) UNSIGNED NOT NULL AUTO_INCREMENT,
	gallery_name VARCHAR(100) NOT NULL,
	PRIMARY KEY(gallery_id)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Galleries created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Create Genre
$sql = "CREATE TABLE Genre (
	genre_id INT(100) UNSIGNED NOT NULL AUTO_INCREMENT,
	genre_name VARCHAR(100) NOT NULL,
	PRIMARY KEY(genre_id)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Genre created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Create Subject
$sql = "CREATE TABLE Subject (
	subject_id INT(100) UNSIGNED NOT NULL AUTO_INCREMENT,
	subject_name VARCHAR(100) NOT NULL,
	PRIMARY KEY(subject_id)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Subject created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Create Artists
$sql = "CREATE TABLE Artists (
	artist_id INT(100) UNSIGNED NOT NULL AUTO_INCREMENT,
	artwork_id INT(100) UNSIGNED NOT NULL,
	genre_id INT(100) UNSIGNED NOT NULL,
	artist_name VARCHAR(100) NOT NULL,
	DOB VARCHAR(100) NOT NULL,
	POL VARCHAR(100) NOT NULL,
	description VARCHAR(255) NOT NULL,
	PRIMARY KEY(artist_id),
	FOREIGN KEY(genre_id) REFERENCES Genre(genre_id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Artists created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Create Artworks
$sql = "CREATE TABLE Artworks (
	artworks_id INT(100) NOT NULL AUTO_INCREMENT,
	images_id INT(100) UNSIGNED NOT NULL,
	imagel_id INT(100) UNSIGNED NOT NULL,
	artist_id INT(100) UNSIGNED NOT NULL,
	genre_id INT(100) UNSIGNED NOT NULL,
	subject_id INT(100) UNSIGNED NOT NULL,
	artwork_name VARCHAR(100) NOT NULL,
	price INT(100) UNSIGNED NOT NULL,
	artwork_date VARCHAR(100) NOT NULL,
	artwork_type VARCHAR(100) NOT NULL,
	description VARCHAR(255) NOT NULL,
	PRIMARY KEY(artworks_id),
	FOREIGN KEY(images_id) REFERENCES Image_s(images_id) ON DELETE CASCADE,
	FOREIGN KEY(imagel_id) REFERENCES Image_l(imagel_id) ON DELETE CASCADE,
	FOREIGN KEY(artist_id) REFERENCES Artists(artist_id) ON DELETE CASCADE,
	FOREIGN KEY(genre_id) REFERENCES Genre(genre_id) ON DELETE CASCADE,
	FOREIGN KEY(subject_id) REFERENCES Subject(subject_id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Artworks created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($conn->query($sql) === TRUE) {
  echo "Added row to Artworks successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();

/*

CREATE TABLE ShoppingCart{

	SC_id INT(100) UNSIGNED NOT NULL AUTO_INCREMENT,
	artwork_id INT,
	price INT(100), UNSIGNED NOT NULL,
	Quantity INT(100) UNSIGNED NOT NULL,
	S_method VARCHAR(100) NOT NULL,
	PRIMARY KEY(SC_id),
	FOREIGN KEY(artwork_id) REFERENCES Artworks(artwork_id)

};

CREATE TABLE Review{

	review_id INT(100) UNSIGNED NOT NULL AUTO_INCREMENT,
	artwork_id INT,
	PRIMARYKEY(review_id),
	FOREIGN KEY(artwork_id) REFERENCES Artworks(artwork_id)

}
*/
?>
