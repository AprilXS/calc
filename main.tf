provider "google" {
    credentials = file("gcp-account.json")
    project = "hip-fusion-428112-u2"
    region  = "us-central1"
    zone    = "us-central1-a"
}

resource "google_compute_instance" "vm_instance" {
  name         = "terraform-instance"
  machine_type = "e2-micro"

  boot_disk {
    initialize_params {
      image = "debian-cloud/debian-11"
    }
  }

  network_interface {
    # A default network is created for all GCP projects
    network = "default"
    access_config {
    }
  }
}