document.addEventListener("DOMContentLoaded", () => {
    const timelineItems = document.querySelectorAll(".timeline-item");
  
    const isInViewport = (element) => {
      const rect = element.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <=
          (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
    };
  
    const handleScroll = () => {
      timelineItems.forEach((item) => {
        if (isInViewport(item)) {
          item.classList.add("visible");
        } else {
          item.classList.remove("visible");
        }
      });
    };
  
    window.addEventListener("scroll", handleScroll);
  });
  