
const checkbox = document.getElementById('confirmation-checkbox');
const submitButton = document.getElementById('submit-button');

checkbox.addEventListener('change', function() {
    submitButton.disabled = !this.checked;
});

// Initialize submit button state
submitButton.disabled = true;
document.addEventListener('DOMContentLoaded', function() 
{
                  // Toggle category sections
                  const categoryHeaders = document.querySelectorAll('.category-header');
                  categoryHeaders.forEach(header => {
                    header.addEventListener('click', function() {
                      const section = this.parentElement;
                      section.classList.toggle('active');
                    });
                  });
                  
                  // Division selection
                  const divisionOptions = document.querySelectorAll('.division-option');
                  const submitBtn = document.querySelector('.submit-btn');
                  
                  divisionOptions.forEach(option => {
                    option.addEventListener('click', function() {
                      // Clear previous selection
                      divisionOptions.forEach(opt => opt.classList.remove('selected'));
                      
                      // Select current option
                      this.classList.add('selected');
                      
                      // Enable submit button
                      submitBtn.disabled = false;
                    });
                  });
                });