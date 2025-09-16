<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | Malcolm Lismore Photography</title>
  <link rel="icon" type="image/png" href="logo head.png">
  <link rel="stylesheet" href="stylesAdmin.css">
</head>
<body>
  <header class="admin-header">
    <h1>Admin Dashboard</h1>
    <nav>
      <a href="#upload-images">Upload Images</a>
      <a href="#manage-images">Manage Images</a>
      <a href="#view-bookings">View Bookings</a>
      <a href="#view-inquiries">View Inquiries</a>
      <a href="adminLogout.php">Logout</a>
    </nav>
  </header>

  <main class="admin-container">
    <!-- Upload Images Section -->
    <section id="upload-images">
      <h2>Upload Images</h2>
      <form action="uploadImage.php" method="POST" enctype="multipart/form-data">
        <label for="category">Select Category:</label>
        <select name="category" id="category" required>
          <?php
          // Fetch categories from the database
          $conn = new mysqli('localhost', 'root', '', 'photography_website');
          $result = $conn->query("SELECT * FROM categories");
          while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['name']}</option>";
          }
          ?>
        </select>

        <label for="image">Select Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required>

        <button type="submit">Upload</button>
      </form>
    </section>

    <!-- Manage Uploaded Images Section -->
    <section id="manage-images">
      <h2>Manage Uploaded Images</h2>
      <table>
        <thead>
          <tr>
            <th>Image</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Fetch images and their categories from the database
          $result = $conn->query("SELECT images.id, images.image_path, categories.name AS category_name FROM images JOIN categories ON images.category_id = categories.id");
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td><img src='{$row['image_path']}' alt='{$row['category_name']} Photo' style='width: 100px; height: auto;'></td>
                    <td>{$row['category_name']}</td>
                    <td>
                      <form action='deleteImage.php' method='POST'>
                        <input type='hidden' name='imageId' value='{$row['id']}'>
                        <button type='submit'>Delete</button>
                      </form>
                    </td>
                  </tr>";
          }
          ?>
        </tbody>
      </table>
    </section>

            </tbody>
          </table>
        </section>
    
        <!-- View Bookings Section -->
        <section id="view-bookings">
          <h2>View Bookings</h2>
          <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Session Type</th>
                <th>Preferred Time</th>
                <th>Preferred Date</th>
                <th>Message</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Fetch bookings from the database
              $result = $conn->query("SELECT * FROM bookings");
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['session_type']}</td>
                        <td>{$row['preferred_time']}</td>
                        <td>{$row['preferred_date']}</td>
                        <td>{$row['message']}</td>
                        <td>
                          <form action='deleteBooking.php' method='POST' onsubmit=\"return confirm('Are you sure you want to delete this booking?');\">
                            <input type='hidden' name='bookingId' value='{$row['id']}'>
                            <button type='submit'>Delete</button>
                          </form>
                        </td>
                      </tr>";
              }
              ?>
            </tbody>
          </table>
        </section>
        
        <!-- View Inquiries Section -->
        <section id="view-inquiries">
          <h2>View Inquiries</h2>
          <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Submitted At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Fetch inquiries from the database
              $result = $conn->query("SELECT * FROM inquiries");
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['message']}</td>
                        <td>{$row['submitted_at']}</td>
                        <td>
                          <form action='deleteInquiry.php' method='POST' onsubmit=\"return confirm('Are you sure you want to delete this inquiry?');\">
                            <input type='hidden' name='inquiryId' value='{$row['id']}'>
                            <button type='submit'>Delete</button>
                          </form>
                        </td>
                      </tr>";
              }
              $conn->close();
              ?>
            </tbody>
          </table>
        </section>
  </main>
  <footer>
    <div class="footer-content">
      <p>© 2025 Malcolm Lismore Photography. All rights reserved. | <i>Developed by Tharusha Prabodhyaya</i></p>
    </div>
  </footer>
</body>
</html>